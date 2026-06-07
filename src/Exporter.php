<?php

namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;

class Exporter
{
    /**
     * @param Logger $logger
     */
    public function __construct(
        private Logger $logger,
    ) {}

    /**
     * @param array $rows
     * @param string $filename
     * @return void
     * @throws Exception
     */
    public function export(array $rows, string $filename): void
    {
        // 1. Генерація Excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'ID','Дата','Марка','Модель','Рік','Ціна','Телефон','Посилання','Місто','Пробіг',
            'Паливо','Трансмісія','Тип приводу','Колір','VIN'
        ];

        $sheet->fromArray($headers, null, 'A1');
        $sheet->fromArray($rows, null, 'A2');

        $rowIndex = 2;
        foreach ($rows as $row) {
            $url = $row[7] ?? null;

            if (!empty($url)) {

                // 👉 якщо немає http/https — додаємо
                if (!preg_match('#^https?://#', $url)) {
                    $url = 'https://auto.ria.com' . (str_starts_with($url, '/') ? $url : '/' . $url);
                }

                $cell = 'H' . $rowIndex;

                $sheet->setCellValue($cell, $url);
                $sheet->getCell($cell)->getHyperlink()->setUrl($url);

                $sheet->getStyle($cell)->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => '0000FF'],
                        'underline' => 'single',
                    ],
                ]);
            }

            $rowIndex++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        // 2. Завантаження в Google Drive через Google API
//        try {
//            $this->uploadToGoogleDrive($filename);
//        } catch (\Google\Service\Exception|\Google\Exception $e) {
//            $this->logger->error('Google Drive upload failed', [
//                'message' => $e->getMessage(),
//                'file' => $filename,
//                'trace' => $e->getTraceAsString(),
//            ]);
//
//            throw new \RuntimeException(
//                'Файл збережено локально, але не вдалося завантажити в Google Drive'
//            );
//        }

        // 3. Завантаження в Google Drive через Apps Script
        $this->uploadViaAppsScript($filename);
    }

    /**
     * @param string $filePath
     * @return void
     * @throws \Google\Exception
     * @throws \Google\Service\Exception
     */
    private function uploadToGoogleDrive(string $filePath): void
    {
        $client = new Client();
        $client->setAuthConfig(__DIR__ . '/../google-credentials.json');
        $client->addScope(Drive::DRIVE);

        $service = new Drive($client);

        $fileMetadata = new DriveFile([
            'name' => basename($filePath),
            // 👇 Це магія — конвертація в Google Sheets
            'mimeType' => 'application/vnd.google-apps.spreadsheet'
        ]);

        $content = file_get_contents($filePath);

        $file = $service->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        echo "Файл завантажено в Google Sheets. ID: " . $file->id . PHP_EOL;
    }

    /**
     * @param string $filePath
     * @return void
     */
    private function uploadViaAppsScript(string $filePath): void
    {
        $url = 'https://script.google.com/macros/s/AKfycbynEDKgzVJnFmtu-FVdqVjTReHD9xXRnxDBwJASkdL6mlgHIJf1hmxVjmy1hIbxJE8N/exec';

        $fileContent = base64_encode(file_get_contents($filePath));

        $postData = [
            'file' => $fileContent,
            'fileName' => basename($filePath),
            'mimeType' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($ch);

        // ❗ перевірка на помилку cURL
        if ($response === false) {
            $this->logger->error('Curl error', [
                'error' => curl_error($ch),
            ]);
            curl_close($ch);
            return;
        }

        curl_close($ch);

        // ❗ лог сирого response (дуже важливо)
        $this->logger->info('Raw response from Apps Script', [
            'response' => $response,
        ]);

        $responseData = json_decode($response, true);

        // ❗ перевірка JSON
        if (!$responseData) {
            $this->logger->error('Invalid JSON response', [
                'response' => $response,
            ]);
            return;
        }

        if (($responseData['status'] ?? null) === 'success') {
            echo $responseData['url'] ?? '';

            $this->logger->info('Google Drive upload success', [
                'url' => $responseData['url'] ?? null,
            ]);

            return;
        }

        // ❗ якщо не success
        $this->logger->error('Google Drive upload failed', [
            'response' => $responseData,
        ]);
    }
}
