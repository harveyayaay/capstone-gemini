<?php

namespace App\Http\Livewire\Supervisor;

use Livewire\Component;

class ActivityTracker extends Component
{
  public $type;
  public $case_num;
  public $datetime;
  public $date_received;
  public $time_start;
  public $time_hold;
  public $time_continue;
  public $time_end;
  public $process_duration;
  public $hold_duration;
  public $status;

  public function submit()
  {
      $validatedData = $this->validate([
        'current_date' => '2021-01-28',
        'type' => 'required',
        'case_num' => 'required',
        'date_received' => '2021-01-28',
        'time_start' => '00:00:00',
        'time_hold' => '00:00:00',
        'time_continue' => '00:00:00',
        'time_end' => '00:00:00',
        'process_duration' => '00:00:00',
        'hold_duration' => '00:00:00',
        'status' => 'Ongoing',
      ]);


      Task::create($validatedData);

      return redirect()->to('/activity-monitoring');
  }

    public function render()
    {
        return view('livewire.supervisor.activity-tracker');
    }
}
