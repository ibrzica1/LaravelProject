<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view("weather", compact('weathers'));
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

    public function getWeatherSingle($city)
    {
        $data = [
            [
                'city' => 'Beograd',
                'monday' => 23,
                'tuesday' => 24,
                'wednesday' => 24,
                'thursday' => 25,
                'friday' => 23,
            ],
            [
                'city' => 'Zagreb',
                'monday' => 21,
                'tuesday' => 22,
                'wednesday' => 23,
                'thursday' => 23,
                'friday' => 21,
            ],
            [
                'city' => 'Sarajevo',
                'monday' => 24,
                'tuesday' => 25,
                'wednesday' => 26,
                'thursday' => 26,
                'friday' => 24,
            ],
            [
                'city' => 'Ljubljana',
                'monday' => 20,
                'tuesday' => 21,
                'wednesday' => 22,
                'thursday' => 22,
                'friday' => 20,
            ],
        ];
        $selectedCity = [];
        foreach($data as $singleData)
        {
            if(strtolower($singleData['city']) === strtolower($city)){
                $selectedCity = $singleData;
            }
        }
        if($selectedCity === null){
            die("City $city doesnt exist");
        }

        return view('weatherSingle',compact('selectedCity'));
    }
}
