<?php

namespace App\WeatherApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class MeteoWeather implements ApiWeatherInterface
{
    private $uri = 'https://api.meteo.lt/v1/places/';
    private $uriFixedParams = '/forecasts/long-term';
    private $apiKeyForecast = "forecastTimestamps";
    private $apiKeyCondition = "conditionCode";

    /**
     * @param string $city
     * @return string
     */
    public function getCurrentWeather(string $city) : string
    {
        $message = "Couldn't get Weather";
        $currentWeather = null;

        $client = new Client();

        try{
            $request = $client->get($this->uri . $city . $this->uriFixedParams);
            $response = json_decode($request->getBody(), true);
        } catch(ClientException $e){
            $response = [
                "error" => $message,
            ];
        }

        if (!isset($response['error'])) {
            $currentWeather = $response[$this->apiKeyForecast][0][$this->apiKeyCondition];
        }

        return $currentWeather ?? $response['error'];
    }
}
