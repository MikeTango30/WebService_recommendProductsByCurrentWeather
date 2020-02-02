<?php

namespace App\Http\Controllers;

use App\WeatherApi\ApiWeather;
use Illuminate\Http\Request;

class RecommendedProductsController extends Controller
{

    public function show($city, ApiWeather $apiWeather)
    {
        $currentWeather = $apiWeather->getCurrentWeather($city);
        if (!$currentWeather) {
            abort(404);
        }

        return "$currentWeather";
    }
}
