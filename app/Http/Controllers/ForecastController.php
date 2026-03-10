<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function getWeatherSingle(City $city)
    {
        $selectedCity = City::with('forecasts')->find($city)->first();

        if($selectedCity === null){
            die("City $city doesnt exist");
        }
        
        return view('weatherSingle',compact('selectedCity'));
    }

    public function forcastsPage()
    {
        $cities = City::with('forecasts')->get();

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

    public function searchForecastCity(Request $request)
    {
        $cityName = $request->get('city');
        $user = Auth::user();
        $city = City::where('name',$cityName)->first();

        if($city === null){
            City::create([
                'name'=> $cityName
            ]);
            $city = City::where('name',$cityName)->first();
        }
        
        if($city->todayForecast === null)
        {
            Artisan::call('weather:get-current' ,[
                'city' => $cityName
            ]);
            $data = json_decode(Artisan::output());
            
            if($data !== null){
                $forecasts = $data->forecast->forecastday;
                
                foreach($forecasts as $forecast)
                {
                    Forecast::create([
                        'city_id' => $city->id,
                        'temperature' => round($forecast->day->avgtemp_c),
                        'weather_type' => strtolower($forecast->day->condition->text),
                        'date' => $forecast->date,
                        'probability' => $forecast->day->daily_chance_of_rain
                    ]);
                }
            }
        }
        

        $cities = City::with('todayForecast')->where('name','LIKE',"%$cityName%")->get();

        if(count($cities) === 0){
            return redirect()->back()->with('error','Nothing found');
        }

        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = $user->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }
        
        return view('searchForecast', compact('cities','userFavourites'));
    }

    public function cityForecastPage(City $city)
    {
        Artisan::call('weather:get-current' ,[
                'city' => $city->name
            ]);
            $forecasts = json_decode(Artisan::output());
        return view('cityForecast',compact('forecasts'));
    }
}


