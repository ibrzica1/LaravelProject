<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();

        foreach($cities as $city)
        {
            for($i=0; $i<5; $i++)
            {
                $cityId = $city->id;
                $temperature = rand(-10,45);
                $date = Carbon::today()->subDays(rand(0, 365));

                Forecast::create([
                    'city_id' => $cityId,
                    'temperature' => $temperature,
                    'date' => $date,
                ]);
            }
        }
    }
}
