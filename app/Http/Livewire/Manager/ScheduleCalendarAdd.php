<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;

class ScheduleCalendarAdd extends Component
{
  public $picked_date;

    public function render()
    {
        return view('livewire.manager.schedule-calendar-add');
    }

    public function mount($date)
    {
      $this->picked_date = $date;
    }
}
