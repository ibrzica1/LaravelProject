<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Forecast;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view("weather", compact('weathers'));
    }

    public function addWeatherPage()
    {
        $cities = City::all();

        return view('addWeatherPage',compact('cities'));
    }

    public function addWeather(Request $request)
    {
        $request->validate([
            "city" => "required|string|min:2|max:50|unique:weather,city",
            "temperature" => "required|int|min:-80|max:80",
        ]);

        Weather::create([
            "city" => $request->get('city'),
            "temperature" => $request->get('temperature'),
        ]);

        return redirect()->route('weather.page');
    }

    public function deleteWeather(Weather $weather)
    {
        $weather->delete();

        return redirect()->back();
    }

    public function editWeatherPage(Weather $weather)
    {
        return view('editWeatherPage', compact('weather'));
    }

    public function editWeather(Request $request, Weather $weather)
    {
        $request->validate([
            "city" => "required|string|min:2|max:50",
            "temperature" => "required|int|min:-80|max:80",
        ]);

        $weather->update([
            "city" => $request->get('city'),
            "temperature" => $request->get('temperature'),
        ]);

        return redirect()->route('weather.page');
    }

   
}
