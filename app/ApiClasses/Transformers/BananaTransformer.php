<?php

namespace App\ApiClasses\Transformers;

use App\Interfaces\TransformerInterface;
use Carbon\Carbon;

class BananaTransformer implements TransformerInterface {

    const OPERATOR_CODE = 'BF';
    const PORT_ORIGIN = 'Banana Puerto';
    const OPERATOR_NAME = 'banana ferries';
    const PORT_DESTINATION = '3 miles away';

    public function transform(array $items) : array
	{

        $itineraries = array();

        $pricePerPassengerTypeArray = array(); // just for consistency


        foreach($items as $item) {
            array_push($itineraries, [
                "itineraryId"=> "",
                "originPortCode"=> self::PORT_ORIGIN,
                "destinationPortCode"=> self::PORT_DESTINATION,
                "operatorCode"=> self::OPERATOR_CODE,
                "operatorName"=> self::OPERATOR_NAME,
                "vesselName"=> $item["vessel"],
                "departureDateTime"=>$this->transformTimeStrings('d-m-Y H:i', $item['date'],$item['departsAt'])->toDateTimeString(), // check utc issues
                "arrivalDateTime"=> $this->transformTimeStrings('d-m-Y H:i', $item['date'],$item['departsAt'])->addMinutes($item['tripDuration'])->toDateTimeString(), // check utc issues
                "pricePerPassengerType"=> $pricePerPassengerTypeArray
            ]);
        }
        return $itineraries;
    }

    public function transformTimeStrings($format, $date, $time) : Carbon {
        return Carbon::createFromFormat($format, $date.' '.$time);
    }

}
