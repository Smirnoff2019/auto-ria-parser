<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class AutoRiaClient
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * @var string|mixed
     */
    private string $apiKey;

    /**
     * @var string|mixed
     */
    private string $baseUrl;

    /**
     * @var int|mixed
     */
    private int $retry;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->client = new Client(['timeout' => 20]);
        $this->apiKey = $config['api_key'];
        $this->baseUrl = $config['base_url'];
        $this->retry = $config['retry_attempts'];
    }

    /**
     * @param string $endpoint
     * @param array $query
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request(string $endpoint, array $query): array
    {
        $query['api_key'] = $this->apiKey;

        for ($i = 1; $i <= $this->retry; $i++) {
            try {
                usleep(300000);
                $response = $this->client->get($this->baseUrl . $endpoint, [
                    'query' => $query
                ]);
                return json_decode($response->getBody(), true);
            } catch (RequestException $e) {

                $status = $e->getResponse()?->getStatusCode();

                if ($status == 429) {
                    sleep(60); // чекати хвилину
                    continue;
                }

                if ($i === $this->retry) {
                    throw $e;
                }

                sleep(2 * $i);
            }
        }

        return [];
    }

    /**
     * @param array $params
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(array $params): array
    {
        return $this->request('search', $params);
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function info(array $params): array
    {
        return $this->request('info', $params);
    }
}
