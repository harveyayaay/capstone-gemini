<?php

namespace App\Http\Livewire\Generate;

use Livewire\Component;
use DB;

class CompletedActivities extends Component
{
  public $date_from;
  public $date_to;
    public function render()
    { 
        $data['tasks'] = DB::table('tasks')
          ->where('status','=','Completed')
          ->where('current_date','>=',$this->date_from)
          ->where('current_date','<=',$this->date_to)
          ->get();
        return view('livewire.generate.completed-activities', $data);
    }

    public function mount()
    {
      $this->date_from = date('Y-m-d', strtotime(date('Y-m')));
      $this->date_to = date('Y-m-d');
    }
}