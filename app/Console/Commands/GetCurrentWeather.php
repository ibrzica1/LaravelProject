<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
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
        $weatherService = new WeatherService();
        
        $resposnse = $weatherService->getForecast($this->argument('city'));
        if(isset($resposnse['error']))
        {
            $this->output->error($resposnse['error']['message']);
        }
        
        $this->line(json_encode($resposnse));
    }
}
