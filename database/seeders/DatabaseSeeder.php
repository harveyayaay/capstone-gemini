<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        'firstname' => 'Admin Firstname',
        'lastname' => 'Admin Lastname',
        'username' => 'admin',
        'email' => 'admin@email.example.com',
        'contact' => '00000000000',
        'position' => 'Manager',
        'status' => 'Active',
        'password' => Hash::make("qwer1234"),
        'profile_photo_path' => 'photos/IHoYLyrAkh6SA5mfz6hnEYfxWp7lD4Ua1j7eDiEb.png',
      ]);   
    }
}
