<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Bezhanov\Faker\Provider\Commerce;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new Commerce($faker));

    return [
        'sku' => $faker->regexify('/([A-Z]{2,3})-(\d{1,2})/'), //ie 'MUP-12'
        'name' => $faker->productName,
        'price' => $faker->randomFloat(2, 4, 50),
        'weather_id' => $faker->numberBetween(1, 13)
    ];
});
