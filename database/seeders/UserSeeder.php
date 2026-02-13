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
        do{
          $name = $this->command->getOutput()->ask("What name would you like?",fake()->name());
        
          if(User::where('name',$name)->exists()){
                $this->command->getOutput()->error("User with the name $name already exists");
            }  
        }
        while (User::where('name',$name)->exists());
        
        $email = $this->command->getOutput()->ask("What email would you like?","nesto@email.com");
        $password = $this->command->getOutput()->ask("What password would you like?","123456789");
        
        User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password), 
        ]);
    
    }
}
