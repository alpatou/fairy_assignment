<?php

namespace App\ApiClasses\Transformers;

use App\Interfaces\TransformerInterface;
use Carbon\Carbon;

class HavanaTransformer implements TransformerInterface {

    public function transform(array $items) : array
	{
        $r = array('itineraries' =>  []);
        // dd($items['trips']);
        $pricePerPassengerTypeArray = array();
        foreach($items['prices'] as $type => $price){
            array_push($pricePerPassengerTypeArray, [
                "passengerType"=> $type,
                "passengerPriceInCents"=> (int) $price
            ]);
        }
        foreach($items["trips"] as $item) {
            array_push($r['itineraries'], [
                "itineraryId"=> $item["itinerary"],
                "originPortCode"=> "The unique unique identifier for a port",
                "destinationPortCode"=> "The unique unique identifier for a port",
                "operatorCode"=> "The unique unique identifier for an operator",
                "operatorName"=> "Havana Ferries",
                "vesselName"=> $item["vesselName"],
                "departureDateTime"=> Carbon::createFromFormat('Ymd H:i', $item['date'].' '.$item['departure'])->toDateTimeString(), // check utc issues
                "arrivalDateTime"=> Carbon::createFromFormat('Ymd H:i', $item['date'].' '.$item['arrival'])->toDateTimeString(), // check utc issues
                "pricePerPassengerType"=> $pricePerPassengerTypeArray
            ]);
        }
        // dd($r);
        $item = array(
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
        );
        return $r;
    }

}
