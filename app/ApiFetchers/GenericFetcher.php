<?php

namespace App\ApiFetchers;

use GuzzleHttp\Client;

class GenericFetcher {

    protected $endpoint;
    protected $client;

    public function __construct()
    {
        $this->client  = new Client([
            'base_uri' => 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/',
        ]);
        $this->endpoints = [
            'get' => 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/trips/',
            'post' => 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/prices/'
        ];
    }

}
