<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Illuminate\Http\Request;
use DB;

class FieldQA extends Component
{
  public $empid;
  public $qa_actual;
  public $qa_actual_last;
  public $qa_actual_first;
  public $save_btn;

  public function render()
  {
    if($this->qa_actual == $this->qa_actual_first)
        $this->save_btn = false;
    else
        $this->save_btn = true;

    return view('livewire.manager.field-q-a');
  }

  public function mount($actual, $empid)
  {
    $this->empid = $empid;
    $this->qa_actual = $actual;
    $this->qa_actual_last = $actual;
    $this->qa_actual_first = $actual;
    $this->save_btn = false;
  }

  public function saveQA()
  {
    // save qa 
    if($this->qa_actual != null)
    {
      $data['check_qa'] = DB::table('qa_list')
        ->where('empid',$this->empid)
        ->first();
      if($data['check_qa'] == null)
      {
        DB::table('qa_list')->insert([
          'percentage' => $this->qa_actual,
          'empid' => $this->empid,
        ]);
        session()->flash('success', 'QA Updated');
        return redirect()->to('/supervisor/scorecard-management');
      }
      else
      {
        $update_data = [
          'percentage' => $this->qa_actual,
        ];
        $update = DB::table('qa_list')->where('empid',$this->empid)->update($update_data);
        
        DB::table('notifications')->insert([
          'empid' => $this->empid,
          'message' => 'Qa Updated',
          'seen' => false,
          'read' => false,
          'date' => date('Y-m-d H:i:s'),
        ]); 
        session()->flash('success', 'QA Updated');
        return redirect()->to('/supervisor/scorecard-management');
      }
    }
  }
}
