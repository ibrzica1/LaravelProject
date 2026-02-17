<?php

namespace App\Http;

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
}