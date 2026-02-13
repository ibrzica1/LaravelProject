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
            $exist = Weather::where("city",$city)->exists();
            $empty = $city === null;
            if($empty){
                $this->command->getOutput()->error("You didnt enter a city");
            }
            if($exist){
                $this->command->getOutput()->error("City with the name $city already exists");
            }
        }
        while($exist || $empty);

        do {
            $temperature = $this->command->getOutput()->ask("Enter the temperature",);
            $empty = $temperature === null;
            if($empty){
                $this->command->getOutput()->error("You didnt enter a temperature");
            }
        }
        while ($empty);

            Weather::create([
                "city" => $city,
                "temperature" => $temperature,
            ]);
        
        $this->command->getOutput()->info("You entered a city $city with the temperature $temperature");
    }
}
