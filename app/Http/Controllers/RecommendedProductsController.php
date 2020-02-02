<?php

namespace App\Http\Controllers;

use App\WeatherApi\ApiWeatherContract;
use Illuminate\Http\Request;

class RecommendedProductsController extends Controller
{

    public function show($city, ApiWeatherContract $apiWeather)
    {
        $currentWeather = $apiWeather->getCurrentWeather($city);
        if (!$currentWeather) {
            abort(404);
        }

        return "$currentWeather";
    }
}
