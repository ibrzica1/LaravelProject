<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask("Enter a city","Zagreb");
        $temperature = $this->command->getOutput()->ask("Enter the temperature",0); 
        
            Weather::create([
                "city" => $city,
                "temperature" => $temperature,
            ]);
    }
}
