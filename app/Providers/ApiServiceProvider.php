<?php
namespace App\Providers;

use GuzzleHttp\Client;

class ApiServiceProvider {
    public function makeGetRequest($url, $method = 'GET')
    {
        $client = new Client();
        $result = null;

        $response = $client->request($method, $url);
        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            $result = $response->getBody()->getContents();
        }

        return $result;
    }
}
