<?php

namespace App\ApiClasses\ApiFetchers;

use Exception;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Self_;

class GenericFetcher {

    protected $endpoint;
    protected $client;

    const BASE_URI = 'https://fat3lw9sr6.execute-api.eu-west-3.amazonaws.com/prod/';

    public function __construct()
    {
        $this->client  = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    // i was thinking of using factory pattern, but the case is still simple
    // so i made a version of my own. of course, by adding more providers
    // we need this, or a more suitable pattern (abstract factory, adapter etc)
    public function getFetcher($provider) {
        switch($provider) {
            case 'havana':
                return new HavanaApiFetcher();
            break;
            case 'banana':
                return new BananaApiFetcher();
            break;
            default:
                return $this; // never seen this, i guess maybe it should be an exception
            break;
        }
    }


}
