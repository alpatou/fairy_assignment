<?php

namespace App\ApiClasses\ApiFetchers;

use App\ApiClasses\Transformers\BananaTransformer;

class BananaApiFetcher extends GenericFetcher {

    protected $endpoints;

    public function __construct()
    {
        parent::__construct();
    }

    public function getItiniraries() {
        $response = $this->client->request('GET', 'trips/banana');
        return (new BananaTransformer)->transform(json_decode($response->getBody(), true));
    }

}
