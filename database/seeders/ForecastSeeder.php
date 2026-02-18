<?php

namespace Database\Seeders;

use App\Http\ForecastHelper;
use App\Models\City;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();
        $weatherTypes = ['rainy','snowy','sunny','cloudy'];

        foreach($cities as $city)
        {
            for($i=0; $i<5; $i++)
            {
                do{
                    $cityId = $city->id;
                    $date = ForecastHelper::dateHandler($cityId);
                    $weatherType = $weatherTypes[array_rand($weatherTypes)];
                    $weatherType !== 'sunny' ? $probability = rand(1,100) : $probability = 0;
                    
                    if($weatherType === 'sunny'){
                        $temperature = rand(-17,44);
                    }
                    elseif($weatherType === 'cloudy'){
                        $temperature = rand(-17,15);
                    }
                    elseif($weatherType === 'rainy'){
                        $temperature = rand(-10,40);
                    }
                    elseif($weatherType === 'snowy'){
                        $temperature = rand(-17,1);
                    }
                }
                while(ForecastHelper::compareTemperature($temperature,$cityId));

                Forecast::create([
                    'city_id' => $cityId,
                    'temperature' => $temperature,
                    'date' => $date,
                    'weather_type' => $weatherType,
                    'probability' => $probability
                ]);
            }
        }
    }
}
