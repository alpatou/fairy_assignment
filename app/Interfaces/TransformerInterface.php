<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface TransformerInterface {

    public function transform(array $items) : array;

    public function transformTimeStrings($format, $date, $time) : Carbon;

}
