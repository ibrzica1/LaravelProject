<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $temperatures = Weather::all();
        return view("weather", compact('temperatures'));
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
}
