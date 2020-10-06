<?php

namespace App\ApiClasses\Transformers;

use App\Interfaces\TransformerInterface;
use Carbon\Carbon;

class HavanaTransformer implements TransformerInterface {

    const OPERATOR_CODE = 'HF';
    const PORT_ORIGIN = 'Havana Puerto';
    const OPERATOR_NAME = 'havana ferries';
    const PORT_DESTINATION = '3 miles away';

    public function transform(array $items) : array
	{

        $itineraries = array();

        $pricePerPassengerTypeArray = array();

        foreach($items['prices'] as $type => $price){
            array_push($pricePerPassengerTypeArray, [
                "passengerType"=> $type,
                "passengerPriceInCents"=> (int) $price
            ]);
        }

        foreach($items["trips"] as $item) {
            array_push($itineraries, [
                "itineraryId"=> $item["itinerary"],
                "originPortCode"=> self::PORT_ORIGIN,
                "destinationPortCode"=> self::PORT_DESTINATION,
                "operatorCode"=> self::OPERATOR_CODE,
                "operatorName"=> self::OPERATOR_NAME,
                "vesselName"=> $item["vesselName"],
                "departureDateTime"=> $this->transformTimeStrings('Ymd H:i', $item['date'],$item['departure'])->toDateTimeString(), // check utc issues
                "arrivalDateTime"=> $this->transformTimeStrings('Ymd H:i', $item['date'],$item['arrival'])->toDateTimeString(), // check utc issues
                "pricePerPassengerType"=> $pricePerPassengerTypeArray
            ]);
        }
        return $itineraries;
    }

    public function transformTimeStrings($format, $date, $time) : Carbon {
        return Carbon::createFromFormat($format, $date.' '.$time);
    }

}
