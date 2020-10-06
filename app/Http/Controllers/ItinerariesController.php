<?php

namespace App\Http\Controllers;

use App\ApiClasses\ApiFetchers\GenericFetcher;
use App\ApiClasses\Collectors\TripCollector;
use Exception;
use Illuminate\Http\Request;

class ItinerariesController extends Controller
{
    public function index() {
        try {
            $collector = new TripCollector(new GenericFetcher());
            $finalData = $collector->collectTrips();
            return response()->json($finalData,200);
        } catch(Exception $e) {
            return response()->json([
            "status" => false,
            "errorCode" => $e->getCode(),
            "errorDescription" => $e->getMessage()
            ], 500);
        }

    }
}
