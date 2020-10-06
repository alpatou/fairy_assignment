<?php

namespace App\ApiClasses\ApiFetchers;

use App\ApiClasses\Transformers\HavanaTransformer;

class HavanaApiFetcher extends GenericFetcher {

    protected $endpoints;

    public function __construct()
    {
        parent::__construct();
    }

    public function getItiniraries() {
        $response = $this->client->request('GET', 'trips/havana');
        return (new HavanaTransformer)->transform(json_decode($response->getBody(), true));
    }

}
