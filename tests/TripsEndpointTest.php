<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TripsEndpointTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testThatEndpointWorks()
    {
        $this->json('GET', '/itineraries')
             ->seeJson([
                'itineraryId' => 1,
             ]);
    }

    public function testThatStatusIsDiakosia() {
        $response = $this->call( 'GET' , '/itineraries' );
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testThatReturnsJSON() {
        $response = $this->call( 'GET' , '/itineraries' );
        $this->assertJson($response->getContent());
    }


}
