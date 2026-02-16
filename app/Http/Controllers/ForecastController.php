<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function getWeatherSingle(City $city)
    {
        $selectedCity = City::find($city)->first();

        if($selectedCity === null){
            die("City $city doesnt exist");
        }
        
        return view('weatherSingle',compact('selectedCity'));
    }

    public function forcastsPage()
    {
        $cities = City::all();

        return view('forecasts', compact('cities'));
    }
}
