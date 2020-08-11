<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    /**
     * Model with invalid weather test.
     *
     * @return void
     */
    public function test_find_product_with_invalid_weather()
    {
        $this->withoutExceptionHandling();

        $currentWeather = "Couldn't get Weather";
        $products = Product::findByWeather($currentWeather);

        $this->assertEmpty($products);
    }

    /**
     * Model with valid weather test.
     *
     * @return void
     */
    public function test_find_product_with_valid_weather()
    {
        $this->withoutExceptionHandling();

        $currentWeather = "clear";

        $products = Product::findByWeather($currentWeather);

        $this->assertIsObject($products);
    }
}
