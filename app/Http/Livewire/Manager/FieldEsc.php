<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Illuminate\Http\Request;
use DB;

class FieldEsc extends Component
{
  public $empid;
  public $esc_actual;
  public $esc_actual_last;
  public $esc_actual_first;
  public $save_btn;

  public function render()
  {
    if($this->esc_actual == $this->esc_actual_first)
        $this->save_btn = false;
    else
        $this->save_btn = true;

    return view('livewire.manager.field-esc');
  }

  public function mount($actual, $empid)
  {
    $this->empid = $empid;
    $this->esc_actual = $actual;
    $this->esc_actual_last = $actual;
    $this->esc_actual_first = $actual;
    $this->save_btn = false;
  } 

  public function saveESC()
  {
    // save esc 
    if($this->esc_actual != null)
    {
      $data['check_esc'] = DB::table('escalations')
        ->where('empid',$this->empid)
        ->first();
      if($data['check_esc'] == null)
      {
        DB::table('escalations')->insert([
          'escalation' => $this->esc_actual,
          'empid' => $this->empid,
        ]);
        DB::table('notifications')->insert([
          'empid' => $this->empid,
          'message' => 'ESC Updated',
          'seen' => false,
          'read' => false,
          'date' => date('Y-m-d H:i:s'),
        ]); 
        session()->flash('success', 'ESC Updated');
        return redirect()->to('/supervisor/scorecard-management');
      }
      else
      {
        $update_data = [
          'escalation' => $this->esc_actual,
        ];
        $update = DB::table('escalations')->where('empid',$this->empid)->update($update_data);
        DB::table('notifications')->insert([
          'empid' => $this->empid,
          'message' => 'ESC Updated',
          'seen' => false,
          'read' => false,
          'date' => date('Y-m-d H:i:s'),
        ]); 
        session()->flash('success', 'ESC Updated');
        return redirect()->to('/supervisor/scorecard-management');
      }
    }
  }
}
