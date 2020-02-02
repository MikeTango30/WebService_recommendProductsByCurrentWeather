<?php

namespace App\Http\Controllers;

use App\Product;
use App\WeatherApi\ApiWeatherContract;
use Illuminate\Http\Request;

class RecommendedProductsController extends Controller
{

    public function show($city, ApiWeatherContract $apiWeather)
    {
        $currentWeather = $apiWeather->getCurrentWeather($city);
        $recommendedProducts = Product::findByWeather($currentWeather);

        if (!$recommendedProducts) {
            abort(404);
        }

        return "$recommendedProducts";
    }
}
