<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for($i=0; $i<100; $i++)
        {
            do
            {
               $city = fake()->city();
               $exists = City::where('name',$city)->exists();
            }
            while($exists);

            City::create([
                'name' => $city,
            ]);
        }
    }
}
