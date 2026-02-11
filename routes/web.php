<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome')
->name("home");
Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/weather',[WeatherController::class, 'index'])
    ->name('weather.page');
    Route::view('/add-weather','addWeatherPage')
    ->name('weather.add.page');
    Route::post('/add_weather',[WeatherController::class, 'addWeather'])
    ->name('weather.add');
    Route::get('/delete-weather/{weather}',[WeatherController::class, 'deleteWeather'])
    ->name('weather.delete');
    Route::get('/edit-weather/{weather}',[WeatherController::class, 'editWeatherPage'])
    ->name('edit.weather.page');
    Route::patch('/edit_weather/{weather}',[WeatherController::class, 'editWeather'])
    ->name('edit.weather');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
