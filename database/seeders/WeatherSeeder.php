<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weather = [
            1 => 25,
            2 => 26,
            3 => 34,
            4 => 33,
        ];

        foreach($weather as $cityId => $temperature)
        {
            Weather::create([
                "city_id" => $cityId,
                "temperature" => $temperature,
            ]);
        }
    }
}
