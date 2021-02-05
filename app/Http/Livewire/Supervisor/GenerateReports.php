<?php

namespace App\Http\Livewire\Supervisor;

use Livewire\Component;
use DB;

class GenerateReports extends Component
{
    public $reports;

    public function render()
    {
        $data1 = DB::table('tasks')->get();
        $data2 = DB::table('task_lists')->get();
        return view('livewire.supervisor.generate-reports', compact('data1', 'data2'));
    }


}
