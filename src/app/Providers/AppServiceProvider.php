<?php

namespace App\Providers;

use App\WeatherApi\ApiWeatherInterface;
use App\WeatherApi\MeteoWeather;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiWeatherInterface::class, function (){
            return new MeteoWeather();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
