<?php


namespace App\WeatherApi;


use GuzzleHttp\Client;

class MeteoWeather implements ApiWeatherContract
{
    private $uri = 'https://api.meteo.lt/v1/places/';
    private $uriFixedParams = '/forecasts/long-term';
    private $apiKeyForecast = "forecastTimestamps";
    private $apiKeyCondition = "conditionCode";

    public function getCurrentWeather($city)
    {
        $client = new Client();

        $request = $client->get($this->uri . $city . $this->uriFixedParams);
        $response = json_decode($request->getBody(), true);

        $currentWeather = $response[$this->apiKeyForecast][0][$this->apiKeyCondition];

        return $currentWeather;
    }
}
