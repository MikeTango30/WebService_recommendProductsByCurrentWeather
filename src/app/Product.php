<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function findByWeather($currentWeather)
    {
        $products = DB::table('products')
            ->join('weathers', 'products.weather_id', '=', 'weathers.id')
            ->select('products.sku', 'products.name', 'products.price')
            ->where('weathers.condition', '=', $currentWeather)
            ->get();

        return $products;
    }
}
