<?php

namespace App\Jobs;

use App\Product;
use App\WeatherApi\ApiWeatherInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetRecommendedProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $city;
    private $apiWeather;

    /**
     * Create a new job instance.
     *
     * @param string $city
     * @param ApiWeatherInterface $apiWeather
     */
    public function __construct(string $city, ApiWeatherInterface $apiWeather)
    {
        $this->city = strtolower($city);
        $this->apiWeather = $apiWeather;
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            "data source" =>'LHMT api.meteo.lt',
            "status" => 200,
            "city" => $this->city,
        ];

        $data["current_weather"] = $this->apiWeather->getCurrentWeather($this->city);
        $data['recommended_products'] = Product::findByWeather($data['current_weather']) ?? 'No products found!';


        return $data;
    }
}
