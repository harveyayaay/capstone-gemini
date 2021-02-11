<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;

class Dashboard extends Component
{
    public $date_from;
    public $date_to;
    public $data_volume = [];
    public $data_dates = [];
    public $labels;

    public function render()
    {
      if($this->date_to < '2021-02-06')
      {
        $this->labels = 'Gaga';
      }
      $this->data_volume = [];
      $this->data_dates = [];

      // MTD Productivity 
      $basedate = $this->date_from;
      while($basedate <= $this->date_to)
      {
        $count = DB::table('tasks')
          ->where('current_date','>=', $basedate)
          ->where('current_date','<', date('Y-m-d', strtotime('+1 day', strtotime($basedate))))
          ->where('status', 'Completed')
          ->count();
        
          $this->data_volume[] = $data['mtd_task_volume'][]= $count;
          $this->data_dates[] = $data['mtd_task_dates'][] = date('F j',strtotime($basedate));
        
        $basedate = date('Y-m-d', strtotime('+1 day', strtotime($basedate)));
      }

      // dump($data['mtd_task_volume']);

      // List of Productivity per Frontliner
      $data['users'] = DB::table('users')
        ->select('id','firstname','lastname')
        ->where('users.status','Active')
        ->where('users.position','Frontliner')
        ->get();

      $data['list_users_prod'] = array();
      $data['list_users_ongoing'] = array();
      
      foreach($data['users'] as $user)
      {
        $prod_volume_count = 0;
        $prod_total_days = 0;
        $prod_average = 0;
        $basedate = $this->date_from;
        while($basedate <= $this->date_to)
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
        
        $data['qa_info'] = DB::table('qa_list')
          ->where('empid',$user->id)
          ->first();

        if($data['qa_info'] == null)
        {
          DB::table('qa_list')->insert([
            'empid' => $user->id,
            'percentage' => 100,
          ]);

          $data['qa_info'] = DB::table('qa_list')
            ->where('empid',$user->id)
            ->first();
        }

        $data['esc_info'] = DB::table('escalations')
          ->where('empid',$user->id)
          ->first();
        
        if($data['esc_info'] == null)
        {
          DB::table('escalations')->insert([
            'empid' => $user->id,
            'escalation' => 0,
          ]);

        $data['esc_info'] = DB::table('escalations')
          ->where('empid',$user->id)
          ->first();
        }
        
        // Ongoing Tasks
        $data['task_info'] = DB::table('tasks')
          ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
          ->select('tasks.*','task_lists.title')
          ->where('tasks.empid',$user->id)
          ->where('tasks.status','Ongoing')
          ->where('tasks.current_date','>',date('Y-m-d',strtotime('-1 day',strtotime(date('Y-m-d')))))
          ->where('tasks.current_date','<',date('Y-m-d',strtotime('+1 day',strtotime(date('Y-m-d')))))
          ->first();

        if($data['task_info'] != null)
        {
          array_push($data['list_users_ongoing'],array(
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "task_ongoing" => $data['task_info']->title,
          ));
        } 
        
        // Result List of Users Prod 
        array_push($data['list_users_prod'],array(
            "firstname" => $user->firstname,
            "lastname" => $user->lastname,
            "volume" => $prod_volume_count,
            "average" => number_format((float)$prod_average, 2, '.', ''),
            "qa" => $data['qa_info']->percentage,
            "esc" => $data['esc_info']->escalation,
            "Canvas" => 1,
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

    public function mount()
    {
      $this->labels = 'Gago';
        $this->date_from = date('Y-m-d', strtotime(date('Y-m')));
        $this->date_to = date('Y-m-d');
    }
}
