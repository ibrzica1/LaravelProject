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

    public function addForecastPage()
    {
        $cities = City::all();
        $weatherTypes = Forecast::WEATHER_TYPES;

        return view('addForecastPage', compact('cities','weatherTypes'));
    }

    public function addForecast(Request $request)
    {
        $request->validate([
            'city_id' => 'required|int|exists:cities,id',
            'temperature' => 'required|int|min:-80|max:80',
            'weather_type' => 'required|string',
            'date' => 'required|string',
        ]);

        Forecast::create($request->all());

        return redirect()->route('forecasts.page');
    }
}
