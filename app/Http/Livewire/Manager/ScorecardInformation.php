<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ConvertingTime;
use App\Models\GettingPercentage;

class ScorecardInformation extends Component
{
    public $records;
    public $user_scorecard;
    public $qa_actual;
    public $esc_actual;

    public function render()
    {
     
      return view('livewire.manager.scorecard-information');
    }

    public function saveEscQA($id)
    {
      dd($this->qa_actual);
      // save qa 
      if($this->qa_actual != null)
      {
        $data['check_qa'] = DB::table('qa_list')
          ->where('empid',$id)
          ->first();
        if($data['check_qa'] == null)
        {
          DB::table('qa_list')->insert([
            'percentage' => $this->qa_actual,
            'empid' => $id,
          ]);
        }
        else
        {
          $update_data = [
            'percentage' => $this->qa_actual,
          ];
          $update = DB::table('qa_list')->where('id',$id)->update($update_data);
        }
      }
      // save esc 
      if($this->qa_actual != null)
      {
        $data['check_esc'] = DB::table('escalations')
          ->where('empid',$id)
          ->first();
        if($data['check_esc'] == null)
        {
          DB::table('escalations')->insert([
            'escalation' => $this->esc_actual,
            'empid' => $id,
          ]);
        }
        else
        {
          $update_data = [
            'escalation' => $this->esc_actual,
          ];
          $update = DB::table('escalations')->where('id',$id)->update($update_data);
        }
      }
    }
}
