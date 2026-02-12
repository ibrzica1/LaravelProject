<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Testing\Fakes\Fake;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dd(Hash::make(fake()->password(6,20)));
        for($i=0; $i<500; $i++)
        {
            User::create([
                "name" => fake()->name(),
                "email" => fake()->email(),
                "password" => Hash::make(fake()->password(6,20)), 
            ]);
        }
    }
}
