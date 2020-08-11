<?php

namespace App\WeatherApi;

interface ApiWeatherInterface
{
    public function getCurrentWeather(string $city);
}
