<?php

namespace App\ApiFetchers;

use App\ApiClasses\Transformers\HavanaTransformer;

class HavanaApiFetcher extends GenericFetcher {

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
        $response = $this->client->request('GET', 'trips/havana');
        // dd(json_decode($response->getBody(), true));
        return (new HavanaTransformer)->transform(json_decode($response->getBody(), true));
    }

    public function getPrices() {
        $response = $this->client->request('POST', 'prices/havana', [
            'form_params' => [
                    "itinerary"=> 1,
                    "passengers"=> [
                        [
                            "type"=> "AD",
                            "passenger"=> 1
                        ],
                        [
                            "type"=> "IN",
                            "passenger"=> 2
                        ]
                    ],
            ]
        ]);
        return $response;
    }
}
