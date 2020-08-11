<?php

namespace App\WeatherApi;

interface ApiWeatherContract
{
    public function getCurrentWeather($city);
}
