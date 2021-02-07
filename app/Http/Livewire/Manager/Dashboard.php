<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;

class Dashboard extends Component
{
    public function render()
    {
      $basedate = date('Y-m-d', strtotime(date('Y-m')));
      while($basedate <= date('Y-m-d'))
      {
        $count = DB::table('tasks')
          ->where('current_date','>=', $basedate)
          ->where('current_date','<', date('Y-m-d', strtotime('+1 day', strtotime($basedate))))
          ->where('status', 'Completed')
          ->count();
        
          $data['mtd_task_volume'][]= $count;
          $data['mtd_task_dates'][] = $basedate;

          // array_push($dates,
          //   array(
          //       date('F j',strtotime($basedate)),
          //   )
          // );
        $basedate = date('Y-m-d', strtotime('+1 day', strtotime($basedate)));
      }

      $data['productivity'] = DB::table('users')
        ->join('tasks', 'tasks.empid','users.id')
        ->select('users.firstname', 'users.lastname')
        ->where('users.status','Active')
        ->where('users.position','Frontliner')
        ->where('tasks.status','Completed')
        ->get();

      $produtivity_list = array();

      foreach($data['productivity'] as $prod_list)
      {
        array_push($produtivity_list,
          array(
            "firstname" => $prod_list->firstname,
            "lastname" => $prod_list->lastname,
            "count" => 10,
        ));
      }
      

      // dd($produtivity_list);

      return view('livewire.manager.dashboard', $data);
    }
}
