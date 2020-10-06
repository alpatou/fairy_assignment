<?php

namespace App\ApiClasses\Collectors;

use App\ApiClasses\ApiFetchers\BananaApiFetcher;
use App\ApiClasses\ApiFetchers\GenericFetcher;
use App\ApiClasses\ApiFetchers\HavanaApiFetcher;


class TripCollector {

    private $providers = [
        'havana',
        'banana'
    ];

    private $fetcher;

    public function __construct(GenericFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    public function collectTrips() {
        $allTrips = array();
        foreach($this->providers as $provider) {
            $providerFetcher = $this->fetcher->getFetcher($provider);
            array_push($allTrips , $providerFetcher->getItiniraries());
        }
        $finalData['itineraries'] = array_merge(...$allTrips);
        return $finalData;
    }

}
