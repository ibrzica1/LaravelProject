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
    
    protected $signature = 'weather:get-current {city}';

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
        
        $request = Http::get(env('WEATHER_API_URL').'v1//forecast.json',[
            'key' => env('WEATHER_API_KEY'),
            'q' => $this->argument('city'),
            'days' => 5
        ]);
        
        $resposnse = $request->json();
        if(isset($resposnse['error']))
        {
            $this->output->error($resposnse['error']['message']);
        }
        
        $this->line(json_encode($resposnse));
    }
}
