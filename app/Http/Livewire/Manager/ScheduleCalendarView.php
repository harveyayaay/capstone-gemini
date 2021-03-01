<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;

class ScheduleCalendarView extends Component
{
  public $picked_date;
  public $scheds = [];
  public $tasks = [];
  public $sched_display = [];
  public $current_time;
  public $task_cont;

    public function render()
    {
      $data['task_lists'] = DB::table('task_lists')
        ->select('id', 'title')
        ->where('type', 'Productive')
        ->where('status', 'Active')
        ->orderBy('level')
        ->get();
      
      foreach($data['task_lists'] as $tasks)
      {
        $this->tasks[] = $tasks;
      }

      $data['task_lists_count'] = DB::table('task_lists')
        ->select('id', 'title')
        ->where('type', 'Productive')
        ->where('status', 'Active')
        ->orderBy('level')
        ->count();

      // DB::table('daily_schedule')
      //   ->join('schedules','daily_schedule.schedid','schedules.id')
      //   ->select('schedules.date')
      //   ->where('schedules.date', $this->picked_date)
      //   ->delete();

      $data['schedules'] = DB::table('schedules')
        ->join('users', 'schedules.empid', 'users.id')
        ->select('schedules.id', 'schedules.time', 'users.firstname', 'users.lastname')
        ->where('schedules.date', $this->picked_date)
        ->get();
        
      foreach($data['schedules'] as $scheds)
      {
        $this->scheds[] = $scheds;
      }

      

      dd($this->sched_display);






      // foreach($data['schedules'] as $sched)
      // {
      //   $ctr = 0;
      //   while($ctr < 3)
      //   {
      //     $task_cont;
      //     foreach($data['schedules'] as $ctr_sched)
      //     {
      //       if($current == $data['task_lists_count'])
      //         $current = 1;
      //       else
      //         ++$current;
      //     }
          
      //     if($sched->time == '18:00:00')
      //     {
      //       if($ctr == 0)
      //         $this->current_time = '18:00:00';
      //       else if($ctr == 2)
      //         $this->current_time = '21:00:00';
      //       else
      //         $this->current_time = '00:00:00';
      //     }
      //     else if($sched->time == '00:00:00')
      //     {
      //       if($ctr == 0)
      //         $this->current_time = '00:00:00';
      //       else if($ctr == 2)
      //         $this->current_time = '03:00:00';
      //       else
      //         $this->current_time = '06:00:00';
      //     }
      //     else if($sched->time == '21:00:00')
      //     {
      //       if($ctr == 0)
      //         $this->current_time = '21:00:00';
      //       else if($ctr == 2)
      //         $this->current_time = '00:00:00';
      //       else
      //         $this->current_time = '03:00:00';
      //     }

      //     $try = 0;
      //     foreach($this->tasks as $task)
      //     {
      //       ++$try;
      //       if($try == $current)
      //       {
      //         $task_cont = $tasks->id;
      //       }
      //     }
          
      //     $this->sched_display[] = array(
      //       'sched_id' => $sched->id,
      //       'sched_fname' => $sched->firstname,
      //       'sched_lname' => $sched->lastname,
      //       'time' => $this->current_time,
      //       'task_id' => $task_cont,
      //     );
          
      //     // $store_data = [
      //     //   'schedid' => $sched->id,
      //     //   'time' => $this->current_time,
      //     //   'taskid' => $task_cont,
      //     // ];
      //     // $store = DB::table('daily_schedule')->insert($store_data);

      //     ++$ctr;
      //   }
      // }
      

      dd($this->sched_display);

      return view('livewire.manager.schedule-calendar-view', $data);
    }

    public function mount($date)
    {
        $this->picked_date = $date;
    }
}
