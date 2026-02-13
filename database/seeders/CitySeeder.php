<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Provider\hr_HR\Address;
use Illuminate\Support\Testing\Fakes\Fake;

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
