<?php

namespace App\Http\Controllers;

use App\Product;
use App\WeatherApi\ApiWeatherContract;

class RecommendedProductsController extends Controller
{
    /**
     * @param string $city
     * @param ApiWeatherContract $apiWeather
     * @return array
     */
    public function show(string $city, ApiWeatherContract $apiWeather) :array
    {
        $city = strtolower($city);
        $currentWeather = $apiWeather->getCurrentWeather($city);
        $recommendedProducts = $this->aggregateRecommendedProducts($city, $currentWeather);

        if (!$recommendedProducts) {
            abort(404,'Whoops, something went wrong');
        }

        return $recommendedProducts;
    }

    /**
     * @param $city
     * @param $currentWeather
     * @return array
     */
    public function aggregateRecommendedProducts(string $city, string $currentWeather): array
    {
        $recommendedProducts = [
            "data source" =>'LHMT api.meteo.lt',
            "city" => $city,
            "current_weather" => $currentWeather,
            "recommended_products" => Product::findByWeather($currentWeather)
        ];

        return $recommendedProducts;
    }
}
