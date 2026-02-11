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

    
}
