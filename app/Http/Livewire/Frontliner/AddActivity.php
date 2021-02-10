<?php

namespace App\Http\Livewire\Frontliner;

use Livewire\Component;
use DB;
use DateTime;

class AddActivity extends Component
{
    public $task_lists;
    public $type;
    public $case_num;
    public $date_received;
    public $add_btn;

    public function render()
    {
      $data['task_lists'] = DB::table('task_lists')
        ->select('id','title')
        ->where('status','Active')
        ->get();

      if(DateTime::createFromFormat('Y-m-d H:i:s', $this->date_received))
      {

      }

      $this->task_lists = $data['task_lists'];

      return view('livewire.frontliner.add-activity');
    }

    public function mount()
    {

    }

    public function add_btn()
    {
        $this->add_btn = true;
        $this->date_received = date('Y-m-d H:i:s',strtotime($this->date_received));
    }
}
