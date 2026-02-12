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
        $amount = $this->command->getOutput()->ask("How much users you want to create?",500);
        $password = $this->command->getOutput()->ask("What password would you like","123456789");
        $this->command->getOutput()->progressStart($amount);
        for($i=0; $i<$amount; $i++)
        {
            User::create([
                "name" => fake()->name(),
                "email" => fake()->email(),
                "password" => Hash::make($password), 
            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
