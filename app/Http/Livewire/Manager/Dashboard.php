<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;

class Dashboard extends Component
{
    public function render()
    {
      // MTD Productivity 
      $basedate = date('Y-m-d', strtotime(date('Y-m')));
      while($basedate <= date('Y-m-d'))
      {
        $count = DB::table('tasks')
          ->where('current_date','>=', $basedate)
          ->where('current_date','<', date('Y-m-d', strtotime('+1 day', strtotime($basedate))))
          ->where('status', 'Completed')
          ->count();
        
          $data['mtd_task_volume'][]= $count;
          $data['mtd_task_dates'][] = date('F j',strtotime($basedate));
        
        $basedate = date('Y-m-d', strtotime('+1 day', strtotime($basedate)));
      }

      // List of Productivity per Frontliner
      $data['users'] = DB::table('users')
        ->select('id','firstname','lastname')
        ->where('users.status','Active')
        ->where('users.position','Frontliner')
        ->get();
      $data['list_users_prod'] = array();

      $loop = 1;
      foreach($data['users'] as $user)
      {
        $prod_volume_count = 0;
        $prod_total_days = 0;
        $prod_average = 0;
        $basedate = date('Y-m-d', strtotime(date('Y-m')));
        while($basedate <= date('Y-m-d'))
        {
          $count = DB::table('tasks')
            ->where('current_date','>=', $basedate)
            ->where('current_date','<', date('Y-m-d', strtotime('+1 day', strtotime($basedate))))
            ->where('status', 'Completed')
            ->where('empid',$user->id)
            ->count();
          $prod_volume_count += $count;
          if($count > 0)
            $prod_total_days += $prod_total_days + 1;
          $basedate = date('Y-m-d', strtotime('+1 day', strtotime($basedate)));
        }

        if($prod_total_days > 0)
        { 
          $prod_average = $prod_volume_count/$prod_total_days;
        }
        else
          $prod_average = $prod_volume_count;

          // dd($data['titles']);

        array_push($data['list_users_prod'],array(
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "volume" => $prod_volume_count,
            "average" => number_format((float)$prod_average, 2, '.', ''),
            // // samples for average per activity
            "Canvas" => $loop++,
            "duration" => date('H:i:s',strtotime("00:".$prod_volume_count.":".$loop))  ,
        ));
      }

      // dd($data['list_users_prod']);

      $data['titles1'][] = '00:04:12';
      $data['titles1'][] = '00:02:03';
      $data['titles1'][] = '00:03:01';
      $data['titles1'][] = '00:02:01';

      $data['user_count_vol1'][] = 4;
      $data['user_count_vol1'][] = 2;
      $data['user_count_vol1'][] = 3;
      $data['user_count_vol1'][] = 2;

      $data['titles2'][] = '00:03:12';
      $data['titles2'][] = '00:01:03';
      $data['titles2'][] = '00:04:00';
      $data['titles2'][] = '00:00:54';

      $data['user_count_vol2'][] = 3;
      $data['user_count_vol2'][] = 1;
      $data['user_count_vol2'][] = 4;
      $data['user_count_vol2'][] = 1;
      
      $data['titles3'][] = '00:03:12';
      $data['titles3'][] = '00:02:03';
      $data['titles3'][] = '00:03:01';
      $data['titles3'][] = '00:00:52';

      $data['user_count_vol3'][] = 3;
      $data['user_count_vol3'][] = 2;
      $data['user_count_vol3'][] = 3;
      $data['user_count_vol3'][] = 1;

      return view('livewire.manager.dashboard', $data);
    }
}
