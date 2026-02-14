<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Weather;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();

        foreach($cities as $city)
        {
            Weather::create([
                "city_id" => $city->id,
                "temperature" => rand(15,30),
            ]);
        }
    }
}
