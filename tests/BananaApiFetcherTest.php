<?php

use App\ApiClasses\ApiFetchers\BananaApiFetcher;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BananaApiFetcherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        // these lines were destined to mock the guzzle response and test the tranformer. I never made it through
        $bananaTrips = [
            [
                "tripId" =>1,
                "vessel"=> "Joey",
                "adults"=> 6,
                "children"=> 5,
                "date"=> "22-6-2020",
                "departsAt"=> "13:00",
                "tripDuration"=> 40
            ]
        ];

        $bananaMock = Mockery::mock(BananaApiFetcher::class);
        $bananaMock->shouldReceive('getItiniraries')->andReturn($bananaTrips);
        $this->assertEquals($bananaTrips, $bananaMock->getItiniraries());
    }
}
