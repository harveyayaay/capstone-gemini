<?php

namespace App\Http\Livewire\Frontliner;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class AddActivity extends Component
{
    public $task_lists;
    public $tlid;
    public $title;
    public $case_num;
    public $date_received;

    public $add_btn;

    public function render()
    {
      $data['task_lists'] = DB::table('task_lists')
        ->select('id','title')
        ->where('status','Active')
        ->get();
      
      foreach($data['task_lists'] as $task)
      {
          $this->tlid = $task->id;
          $this->title = $task->title;
      }

      if(DateTime::createFromFormat('Y-m-d H:i:s', $this->date_received))
      {
        $this->add_btn = true;
      }

      $this->task_lists = $data['task_lists'];

      return view('livewire.frontliner.add-activity');
    }

    public function mount()
    {
        $this->add_btn = false;

    }

    public function add_btn()
    {
        $this->add_btn = true;
        $this->date_received = date('Y-m-d H:i:s',strtotime($this->date_received));
    }

    public function save()
    {

      $store_data = [
        'current_date' => date('Y-m-d H:i:s'),
        'task_lists_id' => $this->tlid,
        'case_num' => $this->case_num,
        'date_received' => $this->date_received,
        'time_start' => date('Y-m-d H:i:s'),
        'time_continue' => date('Y-m-d H:i:s'),
        'time_end' => date('Y-m-d H:i:s'),
        'process_duration' => '00:00:00',
        'hold_duration' => '00:00:00',
        'status' => 'Ongoing',
        'empid' => Auth::id()
      ];
      
      $store = DB::table('tasks')->insert($store_data);
      session()->flash('success', 'Activity is now Ongoing');
      return redirect()->to('/frontliner/activity-tracker');
    }
}