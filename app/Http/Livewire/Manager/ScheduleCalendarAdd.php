<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Illuminate\Support\Arr;
use DB;

class ScheduleCalendarAdd extends Component
{
  public $frontlineSched = array();
  public $frontlineSchedRemove = [];
  public $picked_date;
  public $applybtn;
  public $scheduledIDs = [];
  public $checkedFrontline = [];
  public $initialcheckedFrontline = [];
  public $schedList = [];
  public $frontlineList = [];
  public $changes;
  public $schedListNull;
  public $taskSelected;
  public $taskChanged;

    public function render()
    {
      $data['frontline_list'] = DB::table('users')
        ->select('id', 'firstname','lastname')
        ->where('position', 'Frontliner')
        ->get();

      $data['scheduled_frontline'] = DB::table('schedules')
        ->join('users', 'schedules.empid', 'users.id')
        ->select('schedules.*', 'users.firstname', 'users.lastname')
        ->where('date', $this->picked_date)
        ->get();

      
      $data['task_lists'] = DB::table('task_lists')
        ->where('type', 'Productive')
        ->where('status', 'Active')
        ->get();

      foreach($this->initialcheckedFrontline as $user_id)
      {
        if(!in_array($user_id, $this->checkedFrontline))
          $this->changes = true;
      }

      
      foreach($this->checkedFrontline as $user_id)
      {
        if(!in_array($user_id, $this->initialcheckedFrontline))
          $this->changes = true;
      }

        return view('livewire.manager.schedule-calendar-add', $data);
    }

    public function mount($date)
    {
      $this->changes = $this->change1 = $this->change2 = false;
      $this->picked_date = $date;
      $this->applybtn = false;
      $this->taskChanged = false;
      
      $this->frontlineSelect = Arr::sort($this->frontlineSched);

      $data['frontline_list'] = DB::table('users')
        ->select('id', 'firstname','lastname')
        ->where('position', 'Frontliner')
        ->get();

      $data['scheduled_frontline'] = DB::table('schedules')
        ->join('users', 'schedules.empid', 'users.id')
        ->select('schedules.*', 'users.firstname', 'users.lastname')
        ->where('date', $this->picked_date)
        ->get();
      
      $this->schedListNull = true;
        
      foreach($data['scheduled_frontline'] as $d)
      {
        $this->scheduledIDs[] = $d->empid;
        $this->schedList = $d;
        $this->schedListNull = false;
        $this->taskSelected = $d->taskid;
      } 

      foreach($data['frontline_list'] as $s)
      {
        if(in_array($s->id, $this->scheduledIDs))
        {
          $this->checkedFrontline[] = $s->id;
          $this->initialcheckedFrontline[] = $s->id;
        }
      }
      
      $this->schedList = $data['scheduled_frontline'];
      $this->frontlineList = $data['frontline_list'];

    }
    
    public function updateEmployeeSched()
    {
      $this->applybtn = false;
    }

    public function submit()
    {
      foreach($this->checkedFrontline as $user_id)
      {
        if(!in_array($user_id, $this->initialcheckedFrontline))
        {
          array_push($this->frontlineSched,array(
              "empid" => $user_id,
              "time" => '18:00:00',
            )
          );
        }
      }
      
      foreach($this->initialcheckedFrontline as $user_id)
      {
        if(!in_array($user_id, $this->checkedFrontline))
        {
          $this->frontlineSchedRemove[] = $user_id;
        }
      }
      
      if($this->changes > 0)
      {
        foreach($this->frontlineSchedRemove as $user_id)
        {
          DB::table('schedules')
            ->where('empid', $user_id)
            ->where('date', $this->picked_date)
            ->delete();
        }
        
        $data['task_lists'] = DB::table('task_lists')
          ->where('type', 'Productive')
          ->where('status', 'Active')
          ->first()->id;

        foreach($this->frontlineSched as $sched)
        {
          $store_data = [
            'date' => $this->picked_date, 
            'time' => $sched['time'],
            'empid' => $sched['empid'],
            'taskid' => $data['task_lists'],
          ];
          $store = DB::table('schedules')->insert($store_data);
        }

        session()->flash('success', 'Schedule Updated');
        return redirect()->to('/admin/schedule-management/add-schedule/'.$this->picked_date);
      }
    }
    
    public function frontlineSelect($id)
    {
      if(in_array($id, $this->checkedFrontline))
      {
        if (($key = array_search($id, $this->checkedFrontline)) !== false) 
        {
          unset($this->checkedFrontline[$key]);
        }
      }
      else
      {
        $this->checkedFrontline[] = $id;
      }
    }

    public function timeSelect($id, $time)
    {
      $update_data = [
        'time' => $time
      ];
      $update = DB::table('schedules')->where('id',$id)->update($update_data);
    }

    public function taskSelect($id)
    {
      $this->taskChanged = true;
      $update_data = [
        'taskid' => $this->taskSelected
      ];

      $update = DB::table('schedules')->where('id',$id)->update($update_data);
    }
}
