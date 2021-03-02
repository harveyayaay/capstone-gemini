<?php

namespace App\Http\Livewire\Frontliner;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Auth;

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
      
      // User MTD Productivity 
      $basedate2 = date('Y-m-d', strtotime(date('Y-m')));
      while($basedate2 <= date('Y-m-d'))
      {
        $count2 = DB::table('tasks')
          ->where('current_date','>=', $basedate2)
          ->where('current_date','<', date('Y-m-d', strtotime('+1 day', strtotime($basedate2))))
          ->where('status', 'Completed')
          ->where('empid', Auth::user()->id)
          ->count();
        
          $data['user_mtd_task_volume'][]= $count2;
          $data['user_mtd_task_dates'][] = date('F j',strtotime($basedate2));
        
        $basedate2 = date('Y-m-d', strtotime('+1 day', strtotime($basedate2)));
      }

      // List of Productivity per Frontliner
      $data['users'] = DB::table('users')
        ->select('id','firstname','lastname')
        ->where('users.status','Active')
        ->where('users.position','Frontliner')
        ->where('users.id', Auth::user()->id)
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
      
      $data['list'] = DB::table('task_lists')
        ->select('id','title')
        ->where('type', 'Productive')
        ->where('status', 'Active')
        ->get();

      foreach($data['list'] as $task_list)
      {
        $data['task_count'] = DB::table('tasks')
          ->where('current_date', '>=', date('Y-m-d', strtotime(date('Y-m'))))
          ->where('current_date', '<=', date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m', strtotime('+1 month'))))))
          ->where('task_lists_id', $task_list->id)
          ->where('status', 'Completed')
          ->where('empid', Auth::user()->id)
          ->count();

          $data['titles1'][] = $task_list->title;
          $data['user_count_vol1'][] = $data['task_count'];
      }

      $data['qa'] = DB::table('qa_list')
        ->where('empid', Auth::user()->id)
        ->first()->percentage;
        
      $data['esc'] = DB::table('escalations')
        ->where('empid', Auth::user()->id)
        ->first()->escalation;
      

      return view('livewire.frontliner.dashboard', $data);
    }
}
