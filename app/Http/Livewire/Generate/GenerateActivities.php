<?php

namespace App\Http\Livewire\Generate;

use Livewire\Component;
use DB;
use PDF;

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
      if($this->reference == 'All')
      {
        if($this->search == null)
        {
            // gets data 
              $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
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
          $this->data = DB::table('tasks')
            ->join('users', 'tasks.empid', '=', 'users.id')
            ->where('tasks.type','=',$this->reference)
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
            $this->data = DB::table('tasks')
              ->join('users', 'tasks.empid', '=', 'users.id')
              ->where(function($query){
                  $query
                    ->where('users.firstname','LIKE', "%" . $this->search . "%")
                    ->orWhere('users.lastname','LIKE', "%" . $this->search . "%");
              })
              ->where('tasks.type','=',$this->reference)
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