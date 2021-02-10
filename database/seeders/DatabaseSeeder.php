<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ConvertingTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'firstname' => 'Lino',
        'lastname' => 'Semira',
        'username' => 'admin',
        'email' => 'admin@email.example.com',
        'contact' => '',
        'position' => 'Manager',
        'status' => 'Active',
        'password' => Hash::make("qwer1234"),
        'profile_photo_path' => 'photos/ewydknl22fpMkbemK6epuFF4mYXJ695Fb2PuhLwl.png',
      ]);   
      
      DB::table('qa_reference')->insert([
        'percentage' => 100,
        'score' => '3.0',
      ]);   
      DB::table('qa_reference')->insert([
        'percentage' => 96,
        'score' => '2.5',
      ]);   
      DB::table('qa_reference')->insert([
        'percentage' => 90,
        'score' => '2.0',
      ]);   
      DB::table('qa_reference')->insert([
        'percentage' => 85,
        'score' => '1.5',
      ]);   
      DB::table('qa_reference')->insert([
        'percentage' => 80,
        'score' => '1.0',
      ]);   
    }
}
