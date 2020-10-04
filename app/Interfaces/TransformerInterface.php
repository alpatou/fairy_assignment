<?php

namespace App\Interfaces;

interface TransformerInterface {

    public function transform(array $items) : array;

}
