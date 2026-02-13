<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        do {
            $city = $this->command->getOutput()->ask("Enter a city");
            if($city === null){
                $this->command->getOutput()->error("You didnt enter a city");
            }
            if(Weather::where("city",$city)->exists()){
                $this->command->getOutput()->error("City with the name $city already exists");
            }
        }
        while(Weather::where("city",$city)->exists());

        $temperature = $this->command->getOutput()->ask("Enter the temperature",); 
        if($temperature === null){
            $this->command->getOutput()->error("You didnt enter a temperature");
        }

            Weather::create([
                "city" => $city,
                "temperature" => $temperature,
            ]);
        
        $this->command->getOutput()->info("You entered a city $city with the temperature $temperature");
    }
}
