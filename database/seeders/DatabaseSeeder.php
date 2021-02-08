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

      // $percentages = [];
      // $ranges = [];
      // $from = [];
      // $to = [];
      
      // $type = 'Time';
      // $title = 'Average Processing Time - Application';
      // $goal = '00:05:00';
      // $status = 'Active';
      
      // $percentages[] = 50;
      // $percentages[] = 75;
      // $percentages[] = 100;
      // $percentages[] = 125;
      // $percentages[] = 175;

      // if($type == 'Time')
      // {
    
      //   $goal_seconds = ConvertingTime::convert_seconds($goal);
    
      //   $base_time_in_seconds = 0;
      //   foreach($percentages as $percentage)
      //   {
      //       $from[] = $base_time_in_seconds;
      //       $to[] = ($goal_seconds / 100) * $percentage;
      //       $base_time_in_seconds = (($goal_seconds / 100) * $percentage) + 1;
      //   }

      //   $base_range = 3.0;
    
      //   while($base_range > .5)
      //   {
      //     $ranges[] = $base_range;
      //     $base_range = $base_range - .5;
      //   }


      //   $total_hash = Hash::make($title.$type.$goal.$status);
        
      //   DB::table('metrics')->insert([
      //     'title' => $title,
      //     'type' => $type,
      //     'goal' => $goal_seconds,
      //     'status' => $status,
      //     'total_hash' => $total_hash,
      //   ]); 

      //   $data = DB::table('metrics')
      //     ->select('id')
      //     ->where('total_hash',$total_hash)
      //   ->first();

        
      //   $percentages_time[] = 175;
      //   $percentages_time[] = 125;
      //   $percentages_time[] = 100;
      //   $percentages_time[] = 75;
      //   $percentages_time[] = 50;

      //   $ctr = 0;
      //   foreach($percentages_time as $percentage)
      //   {
      //     DB::table('performance_ranges')->insert([
      //       'metricid' => $data->id,
      //       'range' => $ranges[$ctr],
      //       'percentage' => $percentage,
      //       'from' => $from[$ctr],
      //       'to' => $to[$ctr],
      //       ]); 

      //     ++$ctr;
      //   }
      // }
    }
}
