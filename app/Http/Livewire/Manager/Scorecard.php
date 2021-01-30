<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;

class Scorecard extends Component
{

  public function render()
  {
    $data['task_lists'] = DB::table('task_lists')->get();
    $data['tasks'] = DB::table('task_lists')->get();
    return view('livewire.manager.scorecard', $data);
  }

  public function generate($data)
  {
    dd($this->scores);
  }

}
