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
                $temperature = rand(15,30);
                $date = Carbon::today()->addDays(rand(0,30));

                Forecast::create([
                    'city_id' => $cityId,
                    'temperature' => $temperature,
                    'date' => $date,
                ]);
            }
        }
    }
}
