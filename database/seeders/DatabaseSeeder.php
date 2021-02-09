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
        'contact' => '00000000000',
        'position' => 'Manager',
        'status' => 'Active',
        'password' => Hash::make("qwer1234"),
        'profile_photo_path' => 'photos/IHoYLyrAkh6SA5mfz6hnEYfxWp7lD4Ua1j7eDiEb.png',
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
