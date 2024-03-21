<?php

namespace App\Services;

use GuzzleHttp\Client;

class EnviaAPIService
{
    protected $client;
    protected $apiKey; 

    



    public function __construct()
    {
        $this->apiKey = env('ENVIA_API_KEY'); // Usa la API key desde .env
        $this->client = new Client(); // Crea una instancia de Guzzle Client
    }

    public function calculateShipping($data){
        dd($data);
        try {
            $response = $this->client->post('https://api.envia.com/ship/rate/', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->apiKey,

                ],
                'json' => $data
            ]);

            // dd($response->getBody());

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody(), true);
            } else {
                return ['error' => 'Error HTTP: ' . $response->getStatusCode()];
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
