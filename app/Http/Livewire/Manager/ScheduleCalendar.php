<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;

class ScheduleCalendar extends Component
{
  public $current_date;
  public $month_picked;
  public $initial_day_display;
  public $set_initial_day;
  public $set_last_day;
  public $current_day_display;
  public $last_day_display;

    public function render()
    { 

      $this->initial_day_display = date('Y-m-d', strtotime(date('Y-m', strtotime($this->month_picked))));
      $this->current_day_display = $this->initial_day_display;
      $this->last_day_display = date('Y-m-d', strtotime('-1 day', strtotime('+1 month', strtotime(date($this->initial_day_display))))) ;

      $set_initial_day = date('l', strtotime($this->initial_day_display));
      if($set_initial_day != 'Sunday')
        if($set_initial_day != 'Monday')
          if($set_initial_day != 'Tuesday')
            if($set_initial_day != 'Wednesday')
              if($set_initial_day != 'Thursday')
                if($set_initial_day != 'Friday')
                  $this->set_initial_day = 6;
                else $this->set_initial_day = 5;
              else $this->set_initial_day = 4;
            else $this->set_initial_day = 3;
          else $this->set_initial_day = 2;
        else $this->set_initial_day = 1;
      else $this->set_initial_day = 0;
      
      $set_last_day = date('l', strtotime($this->last_day_display));
      if($set_last_day != 'Sunday')
        if($set_last_day != 'Monday')
          if($set_last_day != 'Tuesday')
            if($set_last_day != 'Wednesday')
              if($set_last_day != 'Thursday')
                if($set_last_day != 'Friday')
                  $this->set_last_day = 0;
                else $this->set_last_day = 1;
              else $this->set_last_day = 2;
            else $this->set_last_day = 3;
          else $this->set_last_day = 4;
        else $this->set_last_day = 5;
      else $this->set_last_day = 6;

      return view('livewire.manager.schedule-calendar');
    }
    
    public function mount()
    {
      $this->current_date = date('Y-m-d');
      $this->month_picked = date('F', strtotime($this->current_date));
    }
    
    public function prev_month()
    {
      $this->current_date = date('Y-m-d', strtotime('-1 month', strtotime($this->current_date)));
      $this->month_picked = date('F', strtotime($this->current_date));
    }
      
    public function next_month()
    {
      $this->current_date = date('Y-m-d', strtotime('+1 month', strtotime($this->current_date)));
      $this->month_picked = date('F', strtotime($this->current_date));
    }
}
