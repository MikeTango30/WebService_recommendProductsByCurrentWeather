<?php

use App\Weather;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weathers')->delete();
        $json = file_get_contents(base_path('database/repositories/weather_conditions.json'));
        $data = json_decode($json);
        foreach ($data as $obj) {
            Weather::create(array(
                "condition" => $obj->condition));
        }
    }
}
