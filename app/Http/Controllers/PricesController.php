<?php

namespace App\Http\Controllers;

use App\ApiFetchers\HavanaApiFetcher;
use Illuminate\Http\Request;

class PricesController extends Controller
{

    public function index() {
        $prices = new HavanaApiFetcher();
        return $prices->getPrices();
    }

}
