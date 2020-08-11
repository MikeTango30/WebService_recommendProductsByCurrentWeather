<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\WeatherApi\MeteoWeather;

class MeteoWeatherTest extends TestCase
{

    /**
     * MeteoWeather method getCurrentWeather test.
     *
     * @return void
     */
    public function test_method_call_with_invalid_city_name()
    {
        $this->withoutExceptionHandling();

        $invalidCity = 'plng';
        $message = "Couldn't get Weather";

        $currentWeather = (new MeteoWeather())->getCurrentWeather($invalidCity);

        $this->assertSame($message, $currentWeather);
    }

    public function test_method_call_with_valid_city_name()
    {
        $this->withoutExceptionHandling();

        $city = 'palanga';
        $currentWeather = (new MeteoWeather())->getCurrentWeather($city);

        $this->assertIsString($currentWeather);
    }
}
