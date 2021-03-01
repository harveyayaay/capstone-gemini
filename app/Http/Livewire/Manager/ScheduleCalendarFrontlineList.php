<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;


class ScheduleCalendarFrontlineList extends Component
{

    public function render()
    {

      return view('livewire.manager.schedule-calendar-frontline-list', $data);
    }
    
    public function mount($date)
    {
      $this->date = $date;
    }
    
}
