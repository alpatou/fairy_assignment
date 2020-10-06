<?php

namespace App\ApiClasses\ApiFetchers;

use App\ApiClasses\Transformers\BananaTransformer;

class BananaApiFetcher extends GenericFetcher {

    protected $endpoints;

    public function __construct()
    {
        parent::__construct();
        $this->endpoints = [
            'get' => 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/trips/havana',
            'post' => 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/prices/havana'
        ];
    }

    public function getItiniraries() {
        $response = $this->client->request('GET', 'trips/banana');
        return (new BananaTransformer)->transform(json_decode($response->getBody(), true));
    }

}
