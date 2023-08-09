<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdmiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {
         // Generate a unique email for the administrator
         $email = 'admin_' . uniqid() . '@gmail.com';

         // Create the administrator user with a unique email and other details
         User::create([
             'name' => 'Laouratou',
             'email' => 'laourat10@gmail.com',
             'password' => Hash::make('111111111'),
             'role' => 'admin',
             'photo' => 'img/connexion1.jpg', // Replace with the URL or path of your default image
         ]);
     }
    }


