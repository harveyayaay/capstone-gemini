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

    
     $title = 'Average Processing Time - Application';
     $type = 'Time';
     $goal = '00:05:00';
     $status = 'Active';

     $total_hash = Hash::make($title.$type.$goal.$status);
       
     DB::table('metrics')->insert([
       'title' => $title,
       'type' => $type,
       'goal' => $goal,
       'status' => $status,
       'total_hash' => $total_hash,
     ]);   

     $data = DB::table('metrics')
       ->select('id')
       ->where('total_hash',$total_hash)
       ->first();

     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 3.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
     ]);   

     $title = 'Average Processing Time - AMIE';
     $type = 'Time';
     $goal = '00:05:00';
     $status = 'Active';

     $total_hash = Hash::make($title.$type.$goal.$status);
       
     DB::table('metrics')->insert([
       'title' => $title,
       'type' => $type,
       'goal' => $goal,
       'status' => $status,
       'total_hash' => $total_hash,
     ]);   

     $data = DB::table('metrics')
       ->select('id')
       ->where('total_hash',$total_hash)
       ->first();

     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 3.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
     ]);   
     
     $title = 'Volume';
     $type = 'Percentage';
     $goal = '1500';
     $status = 'Active';

     $total_hash = Hash::make($title.$type.$goal.$status);
       
     DB::table('metrics')->insert([
       'title' => $title,
       'type' => $type,
       'goal' => $goal,
       'status' => $status,
       'total_hash' => $total_hash,
     ]);   

     $data = DB::table('metrics')
       ->select('id')
       ->where('total_hash',$total_hash)
       ->first();

     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 3.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 2.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.5,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
       ]); 
     DB::table('performance_ranges')->insert([
       'metricid' => $data->id,
       'range' => 1.0,
       'percentage' => 0,
       'from' => '00:00:00',
       'to' => '00:00:00',
     ]);   





    }
}
