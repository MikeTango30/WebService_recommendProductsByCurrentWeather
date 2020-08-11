<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Jobs\GetRecommendedProductsJob;
use App\WeatherApi\ApiWeatherInterface;
use Illuminate\Http\JsonResponse;

class RecommendedProductsController extends Controller
{
    /**
     * @param string $city
     * @param ApiWeatherInterface $apiWeather
     * @return JsonResponse
     */
    public function show(string $city, ApiWeatherInterface $apiWeather) :JsonResponse
    {
        $data = GetRecommendedProductsJob::dispatchNow($city, $apiWeather);

        return response()->json($data);
    }
}
