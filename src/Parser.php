<?php

namespace App;

use DateTime;
use GuzzleHttp\Exception\GuzzleException;

readonly class Parser
{
    /**
     * @param AutoRiaClient $client
     * @param FilterEngine $filter
     * @param Storage $storage
     * @param Logger $logger
     * @param array $brands
     */
    public function __construct(
        private AutoRiaClient $client,
        private FilterEngine  $filter,
        private Storage       $storage,
        private Logger        $logger,
        private array         $brands
    ) {}

    /**
     * @param DateTime $from
     * @param DateTime $to
     * @return array
     * @throws GuzzleException
     */
    public function run(DateTime $from, DateTime $to): array
    {
        $rows = [];

        $fromTs = $from->getTimestamp();
        $toTs   = $to->getTimestamp();

        foreach ($this->brands as $brand => $config) {

            foreach ($config['models'] as $model => $modelRules) {

                $page = 0;

                while (true) {

                    $brandId = $config['id'];
                    $modelId = $modelRules['id'] ?? null;

                    $search = $this->client->search([
                        'marka_id[0]' => $brandId,
                        'model_id[0]' => $modelId,
                        'state[0]'    => 10,
                        'city[0]'     => 0,
                        'status_id'   => 0,
                        'order_by'    => 7,
                        'page'        => $page,
                        'countpage'   => 100,
                    ]);

                    echo "Brand: $brand | Model: $model | Page: $page\n";

                    $ids = $search['result']['search_result']['ids'] ?? [];

                    if (empty($ids)) {
                        break;
                    }

                    $stopModel = false;

                    foreach ($ids as $id) {

                        echo "Fetching ID: $id\n";

                        if ($this->storage->exists($id)) {
                            continue;
                        }

                        $car = $this->client->info([
                            'auto_id' => $id,
                        ]);
//                        print_r($car);
//                        exit;
                        $addDate = $car['addDate'] ?? null;

                        if (!$addDate) {
                            echo "⚠️ No addDate for ID: $id\n";
                            continue;
                        }

                        echo $id . " | " . $addDate . "\n";

                        $createdTs = strtotime($addDate);

                        // 🔥 якщо пішли старіші за from — зупиняємо ВСЮ модель
                        if ($createdTs < $fromTs) {
                            $stopModel = true;
                            break;
                        }

                        if ($createdTs > $toTs) {
                            continue;
                        }

                        if (!$this->filter->pass($car, $brand, $model)) {
                            echo "❌ Filter rejected: $id\n";
                            //print_r($car);
                            continue;
                        }

                        $phone = $car['userPhoneData']['phone'] ?? '';

                        $rows[] = [
                            $id,
                            $car['addDate'] ?? '',
                            $brand,
                            $model,
                            $car['autoData']['year'] ?? '',
                            $car['USD'] ?? '',
                            $phone,
                            $car['linkToView'] ?? '',
                            $car['stateData']['name'] ?? '',
                            $car['autoData']['race'] ?? '',
                            $car['autoData']['fuelName'] ?? '',
                            $car['autoData']['gearboxName'] ?? '',
                            $car['autoData']['driveName'] ?? '',
                            $car['color']['name'] ?? '',
                            $car['VIN'] ?? '',
                        ];

                        $this->storage->save($id);

                        echo "✅ SAVED\n";
                    }

                    if ($stopModel) {
                        break;
                    }

                    $page++;
                }
            }
        }

        return $rows;
    }
}
