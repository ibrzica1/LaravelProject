<?php

namespace App\Http;

use app\Models\Forecast;
use Carbon\Carbon;

class ForecastHelper
{
    public static function getColorByTemperature($temperature)
    {
        if($temperature <= 0){
            return "lightBlue";
        }
        elseif($temperature > 0 && $temperature <= 15){
            return "blue";
        }
        elseif($temperature > 15 && $temperature <= 25){
            return "green";
        }
        else{
            return "red";
        }
    }

    public static function compareTemperature(int $temperature,int $cityId): bool
    {
        $cityForecast = Forecast::where('city_id',$cityId)
        ->orderBy('date', 'desc')
        ->first();

        if($cityForecast === null){
            return false;
        }
        elseif(
            $temperature > $cityForecast->temperature + 5 ||
            $temperature < $cityForecast->temperature - 5
        ){
            return true;
        }
        else{
            return false;
        }
    }

    public static function dateHandler(int $cityId): string
    {
        $cityForecast = Forecast::where('city_id',$cityId)
        ->orderBy('date', 'desc')
        ->first();

        if($cityForecast === null){
            $date = Carbon::today()->addDays(rand(0,30));
        }
        else{
            $date = Carbon::createFromFormat('Y-m-d', $cityForecast->date)->addDays(1);
        }
        return $date;
    }
}