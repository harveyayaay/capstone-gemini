<?php

namespace App\Http\Livewire\Generate;

use Livewire\Component;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;


class GenerateActivities extends Component
{
  public $reference;
  public $status;
  public $search = null;
  public $date_from;
  public $date_to;
  public $count;
  public $process_time;
  public $data;

    public function render()
    { 
            // gets data 
            // $this->data = DB::table('tasks')
            // ->join('users', 'tasks.empid', '=', 'users.id')
            // ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
            // ->where(function($query){
            //     $query
            //       ->where('users.firstname','LIKE', "%" . $this->search . "%")
            //       ->orWhere('users.lastname','LIKE', "%" . $this->search . "%");
            // })
            // ->where('tasks.status','=',$this->reference)
            // ->where('tasks.status','=',$this->status)
            // ->where('tasks.current_date','>=',$this->date_from)
            // ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
            // ->get();



      if($this->reference == 'All')
      {
        if($this->search == null)
        {
          
          if(Auth::user()->position != 'Frontliner')
          {
              // gets data 
                $this->data = DB::table('tasks')
                ->join('users', 'tasks.empid', '=', 'users.id')
                ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
                ->select('tasks.*', 'users.firstname', 'users.lastname', 'task_lists.title')
                ->where('tasks.status','=',$this->status)
                ->where('tasks.current_date','>=',$this->date_from)
                ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
                ->get();

              // gets process time 
              $process_time['time'] = DB::table('tasks')
                ->select(DB::raw('AVG(TIME_TO_SEC(process_duration))'))
                ->where('status','=',$this->status)
                ->whereDate('current_date','>=',$this->date_from)
                ->whereDate('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
                ->first();
              foreach($process_time['time'] as $secondsProcessedTime)
              {
                // converts process time from seconds to H:i:s format
                $hourDifference = intval($secondsProcessedTime/3600);
                $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);
                $minDifference = intval($remainingSeconds/60);
                $remainingSeconds = $remainingSeconds - ($minDifference * 60);

                $this->process_time = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));
              }
              

              $this->count = DB::table('tasks')
                ->where('status','=',$this->status)
                ->where('current_date','>=',$this->date_from)
                ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
                ->count();
          }
          else
          {
            
              // gets data 
              $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
              ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
              ->select('tasks.*', 'users.firstname', 'users.lastname', 'task_lists.title')
              ->where('tasks.status','=',$this->status)
              ->where('tasks.current_date','>=',$this->date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->where('users.id',Auth::user()->id)
              ->get();

              // gets process time 
              $process_time['time'] = DB::table('tasks')
                ->select(DB::raw('AVG(TIME_TO_SEC(process_duration))'))
                ->where('status','=',$this->status)
                ->whereDate('current_date','>=',$this->date_from)
                ->whereDate('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
                ->first();
              foreach($process_time['time'] as $secondsProcessedTime)
              {
                // converts process time from seconds to H:i:s format
                $hourDifference = intval($secondsProcessedTime/3600);
                $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);
                $minDifference = intval($remainingSeconds/60);
                $remainingSeconds = $remainingSeconds - ($minDifference * 60);

                $this->process_time = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));
              }
              

              $this->count = DB::table('tasks')
                ->where('status','=',$this->status)
                ->where('current_date','>=',$this->date_from)
                ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
                ->count();
          }
        }
        else
        {
            // gets data 
            $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
              ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
              ->select('tasks.current_date','task_lists.title','tasks.case_num','date_received','tasks.time_start','tasks.time_end','tasks.hold_duration','tasks.process_duration','users.firstname','users.lastname')
              ->where(function($query){
                  $query
                    ->where('users.firstname','LIKE', "%" . $this->search . "%")
                    ->orWhere('users.lastname','LIKE', "%" . $this->search . "%");
              })
              ->where('tasks.status','=',$this->status)
              ->where('tasks.current_date','>=',$this->date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->get();
            
            // gets process time 
            $process_time['time'] = DB::table('tasks')
              ->select(DB::raw('AVG(TIME_TO_SEC(process_duration))'))
              ->where('status','=',$this->status)
              ->whereDate('current_date','>=',$this->date_from)
              ->whereDate('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->first();
            foreach($process_time['time'] as $secondsProcessedTime)
            {
              // converts process time from seconds to H:i:s format
              $hourDifference = intval($secondsProcessedTime/3600);
              $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);
              $minDifference = intval($remainingSeconds/60);
              $remainingSeconds = $remainingSeconds - ($minDifference * 60);

              $this->process_time = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));
            }
            

            $this->count = DB::table('tasks')
              ->where('status','=',$this->status)
              ->where('current_date','>=',$this->date_from)
              ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->count();
        }
        
      }
      else
      {
        if($this->search == null)
        {
          if(Auth::user()->position != 'Frontliner')
          {
            $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
              ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
              ->select('tasks.*', 'users.firstname', 'users.lastname', 'task_lists.title')
              ->where('task_lists.title','=',$this->reference)
              ->where('tasks.status','=',$this->status)
              ->where('tasks.current_date','>=',$this->date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->where('users.id',Auth::user()->id)
              ->get();
            // gets process time 
            $process_time['time'] = DB::table('tasks')
              ->select(DB::raw('AVG(TIME_TO_SEC(process_duration))'))
              ->where('status','=',$this->status)
              ->whereDate('current_date','>=',$this->date_from)
              ->whereDate('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->first();
            foreach($process_time['time'] as $secondsProcessedTime)
            {
              // converts process time from seconds to H:i:s format
              $hourDifference = intval($secondsProcessedTime/3600);
              $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);
              $minDifference = intval($remainingSeconds/60);
              $remainingSeconds = $remainingSeconds - ($minDifference * 60);
  
              $this->process_time = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));
            }
            $this->count = DB::table('tasks')
              ->where('status','=',$this->status)
              ->where('current_date','>=',$this->date_from)
              ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->count();
          }
        }
        else
        {
            $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
              ->join('task_lists', 'tasks.task_lists_id', '=', 'task_lists.id')
              ->select('tasks.*', 'users.firstname', 'users.lastname', 'task_lists.title')
              ->where(function($query){
                  $query
                    ->where('users.firstname','LIKE', "%" . $this->search . "%")
                    ->orWhere('users.lastname','LIKE', "%" . $this->search . "%");
              })
              ->where('task_lists.title','=',$this->reference)
              ->where('tasks.status','=',$this->status)
              ->where('tasks.current_date','>=',$this->date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->get();

            // gets process time 
            $process_time['time'] = DB::table('tasks')
              ->select(DB::raw('AVG(TIME_TO_SEC(process_duration))'))
              ->where('status','=',$this->status)
              ->whereDate('current_date','>=',$this->date_from)
              ->whereDate('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->first();
            foreach($process_time['time'] as $secondsProcessedTime)
            {
              // converts process time from seconds to H:i:s format
              $hourDifference = intval($secondsProcessedTime/3600);
              $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);
              $minDifference = intval($remainingSeconds/60);
              $remainingSeconds = $remainingSeconds - ($minDifference * 60);

              $this->process_time = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));
            }
            $this->count = DB::table('tasks')
              ->where('status','=',$this->status)
              ->where('current_date','>=',$this->date_from)
              ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
              ->count();
        }
      }
      return view('livewire.generate.generate-activities');
    }

    public function mount($status, $reference)
    {
      $this->reference = $reference;
      $this->status = $status;
      $this->date_from = date('Y-m-d', strtotime(date('Y-m')));
      $this->date_to = date('Y-m-d');
    }
}