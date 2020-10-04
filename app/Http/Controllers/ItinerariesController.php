<?php

namespace App\Http\Controllers;

use App\ApiClasses\Transformers;
use App\ApiClasses\Transformers\HavanaTransformer;
use App\ApiFetchers\HavanaApiFetcher;
use Illuminate\Http\Request;
use League\Fractal;

class ItinerariesController extends Controller
{
    public function index() {

        $trips = new HavanaApiFetcher();
        $trips = $trips->getItiniraries();
        dd($trips);
        return $trips;


        return response()->json(['itineraries' =>  [
            [
              "itineraryId"=> "The unique identifier for an itinerary",
              "originPortCode"=> "The unique unique identifier for a port",
              "destinationPortCode"=> "The unique unique identifier for a port",
              "operatorCode"=> "The unique unique identifier for an operator",
              "operatorName"=> "The name of the operator",
              "vesselName"=> "The name of the vessel",
              "departureDateTime"=> "Departure date & time as Datetime(UTC)",
              "arrivalDateTime"=> "Arrival date & time as Datetime(UTC)",
              "pricePerPassengerType"=> [
                [
                  "passengerType"=> "The unique identifier for a passenger type",
                  "passengerPriceInCents"=> "Price in cents  (numeric)",
                ]
              ]
            ]
        ], 200]);
    }
}
