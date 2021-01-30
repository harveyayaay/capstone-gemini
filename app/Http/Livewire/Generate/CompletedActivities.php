<?php

namespace App\Http\Livewire\Generate;

use Livewire\Component;
use DB;

class CompletedActivities extends Component
{
    public function render()
    { 
        $data['tasks'] = DB::table('tasks')
          ->where('status','=','Completed')
          ->where('current_date','>=',date('Y-m-d', strtotime(date('Y-m'))))
          ->where('current_date','<=',date('Y-m-d'))
          ->get();
        return view('livewire.generate.completed-activities', $data);
    }
}