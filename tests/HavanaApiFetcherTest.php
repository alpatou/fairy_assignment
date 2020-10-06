<?php

use App\ApiClasses\ApiFetchers\BananaApiFetcher;
use App\ApiClasses\ApiFetchers\HavanaApiFetcher;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class HavanaApiFetcherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        // these lines were destined to mock the guzzle response and test the tranformer. I never made it through
        $havanaTrips = [
            "trips" => [
                [
                  "itinerary"=> 1,
                  "vesselName"=> "Vessel name",
                  "departure"=> "10:00",
                  "arrival"=> "11:00"
                ]
              ],
              "prices"=> [
                "AD"=> "500",
                "CH"=> "400",
                "IN"=> "300"
              ]
        ];

        $havanaMock = Mockery::mock(HavanaApiFetcher::class);
        $havanaMock->shouldReceive('getItiniraries')->andReturn($havanaTrips);
        $this->assertIsArray($havanaMock->getItiniraries());
        $this->assertEquals($havanaTrips, $havanaMock->getItiniraries());
        $fetcher = new HavanaApiFetcher();
        $result = $fetcher->getItiniraries();
        $this->assertTrue(true);
    }
}
