<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        do{
          $name = $this->command->getOutput()->ask("What name would you like?",fake()->name());
          $exist = User::where('name',$name)->exists();
          $empty = $name === null;
          if($empty){
            $this->command->getOutput()->error("You didnt enter the name");
          }
          if($exist){
                $this->command->getOutput()->error("User with the name $name already exists");
            }  
        }
        while ($exist || $empty);

        do{
          $email = $this->command->getOutput()->ask("What email would you like?");
          $exist = User::where('email',$email)->exists();
          $empty = $email === null;
          if($empty){
            $this->command->getOutput()->error("You didnt enter the email");
          }

          if($exist){
                $this->command->getOutput()->error("User with the email $email already exists");
            }  
        }
        while ($exist || $empty);
        
        $password = $this->command->getOutput()->ask("What password would you like?","123456789");
        
        User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password), 
        ]);
    
    }
}
