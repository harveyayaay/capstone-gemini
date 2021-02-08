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

        array_push($data['list_users_prod'],array(
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "volume" => $prod_volume_count,
            "average" => number_format((float)$prod_average, 2, '.', ''),
        ));
      }


      return view('livewire.manager.dashboard', $data);
    }
}
