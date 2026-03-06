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
        $q = $this->argument('city');
        
        $request = Http::get('http://api.weatherapi.com/v1//forecast.json',[
            'key' => "cb207081975d431d903160546260303",
            'q' => $q,
            'days' => 5
        ]);
        
        $resposnse = $request->json();
        if(isset($resposnse['error']))
        {
            $this->output->error($resposnse['error']['message']);
        }
        dd($resposnse);
    }
}
