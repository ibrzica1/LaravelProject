<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrentWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = "cb207081975d431d903160546260303";
        $q = "Zagreb";
        $days = 1;
        $url = "http://api.weatherapi.com/v1/current.json?key=$key&q=$q&days=$days";
        
        $request = Http::get($url);
        dd(json_decode($request->body()));
    }
}
