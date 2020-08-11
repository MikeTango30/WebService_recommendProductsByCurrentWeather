<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EndpointTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;
    /**
     * Endpoint with wrong city name test.
     *
     * @return void
     */
    public function test_incorrect_city_given()
    {
        $this->withoutExceptionHandling();

        $strict = true;
        $city = 'skaustmantvanaginskiskes';

        $response = $this->getJson('/api/products/recommended/' . $city);

        $response
            ->assertOK()
            ->assertJson([
                'status' => 400,
                'message' => 'Wrong city name.',
            ], $strict);
    }

    /**
     * Endpoint with correct city name test.
     *
     * @return void
     */
    public function test_correct_city_given()
    {
        $city = 'bezdonys';

        $this->withoutExceptionHandling();

        $response = $this->getJson('/api/products/recommended/' . $city);

        $response
            ->assertOK()
            ->assertJson([
                "data source" =>'LHMT api.meteo.lt',
                "status" => 200,
                "city" => $city,
            ]);
    }
}
