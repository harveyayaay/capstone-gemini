<?php

namespace App\Http\Livewire\Generate;

use Livewire\Component;
use DB;

class GenerateActivities extends Component
{
  public $reference;
  public $status;
  public $date_from;
  public $date_to;

    public function render()
    { 
      if($this->reference == 'All'){
        $data['tasks'] = DB::table('tasks')
          ->where('status','=',$this->status)
          ->where('current_date','>=',$this->date_from)
          ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
          ->get();
      }
      else{
        $data['tasks'] = DB::table('tasks')
          ->where('type','=',$this->reference)
          ->where('status','=',$this->status)
          ->where('current_date','>=',$this->date_from)
          ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($this->date_to))))
          ->get();
      }
        return view('livewire.generate.generate-activities', $data);
    }

    public function mount($status, $reference)
    {
      $this->reference = $reference;
      $this->status = $status;
      $this->date_from = date('Y-m-d', strtotime(date('Y-m')));
      $this->date_to = date('Y-m-d');
    }
}