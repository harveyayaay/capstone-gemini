<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Illuminate\Support\Str;
use DateTime;
use App\Models\ConvertingTime;
use DB;
use Illuminate\Support\Facades\Hash;

class ScorecardManagement extends Component
{

    public $page;
    public $title = 'Average App';
    public $type;
    public $type_last;
    public $samplegoal = '00:05:00';
    public $goal;
    public $reference;
    public $next;

    public $percentage1 = '175';
    public $percentage2 = '125';
    public $percentage3 = '100';
    public $percentage4 = '75';
    public $percentage5 = '50';

    public $performance_ranges_display = array();
    
    public function mount()
    {
      $this->page = 3;
      $this->reference = 'All';
      $this->type = 'Time';
      $this->type_last = 'Time';
      $this->next = false;
    }
    public function next()
    {
      $this->page++;
      $this->next = false;  
    }
    public function prev()
    {
      $this->page--;
    }

    public function render()
    {
      $percentages = [];
      $percentages_time = [];
      $ranges = [];
      $from = [];
      $to = [];


      if($this->page == 1)
      {
        if($this->type != $this->type_last)
        {
          $this->samplegoal = null;
          $this->type_last = $this->type;
        }
        if($this->type == 'Time')
        {
          $this->next = false;
          if(DateTime::createFromFormat('H:i:s', $this->samplegoal) && Str::length($this->title) > 0)
            $this->next = true;
        }
        elseif($this->type == 'Volume')
        {
          $this->next = false;
          if(Str::length($this->samplegoal) > 0 && Str::length($this->title) > 0)
            $this->next = true;
        }
      }
      
      if($this->page == 2)
      {
        $this->next = false;
        if($this->percentage1 > $this->percentage2)
          if($this->percentage2 > $this->percentage3)
            if($this->percentage3 > $this->percentage4)
              if($this->percentage4 >$this->percentage5)
                if($this->percentage5 > 0)
                  $this->next = true;
      }

      if($this->page == 3)
      {

        $performance_ranges_display = array();
        if($this->type == 'Time')
        {
          $percentages[] = $this->percentage5;
          $percentages[] = $this->percentage4;
          $percentages[] = $this->percentage3;
          $percentages[] = $this->percentage2;
          $percentages[] = $this->percentage1;

          $this->goal = ConvertingTime::convert_seconds($this->samplegoal);
          $base_time_in_seconds = 0;
          foreach($percentages as $percentage)
          {
              $from[] = $base_time_in_seconds;
              $to[] = ($this->goal / 100) * $percentage;
              $base_time_in_seconds = (($this->goal / 100) * $percentage) + 1;
          }

          $base_range = 3.0;
          while($base_range > .5)
          {
            $ranges[] = $base_range;
            $base_range = $base_range - .5;
          }

          $percentages_time[] = $this->percentage1;
          $percentages_time[] = $this->percentage2;
          $percentages_time[] = $this->percentage3;
          $percentages_time[] = $this->percentage4;
          $percentages_time[] = $this->percentage5;
  
          $ctr = 0;
          foreach($percentages_time as $percentage)
          {
              array_push($performance_ranges_display,array(
                'range' => $ranges[$ctr],
                'percentage' => $percentage,
                'from' => ConvertingTime::convert_time($from[$ctr]),
                'to' => ConvertingTime::convert_time($to[$ctr]),
              ));
  
            ++$ctr;
          }
          $this->performance_ranges_display = $performance_ranges_display;
        }
        elseif($this->type == 'Volume')
        {
          $percentages[] = $this->percentage1;
          $percentages[] = $this->percentage2;
          $percentages[] = $this->percentage3;
          $percentages[] = $this->percentage4;
          $percentages[] = $this->percentage5;

          $this->goal = $this->samplegoal;
          $base_time = 100000;
          foreach($percentages as $percentage)
          {

              $from[] = ($this->goal / 100) * $percentage;
              $to[] = $base_time;
              $base_time = (($this->goal / 100) * $percentage) + 1;
          }

          $base_range = 3.0;
          while($base_range > .5)
          {
            $ranges[] = $base_range;
            $base_range = $base_range - .5;
          }
  
          $ctr = 0;
          foreach($percentages as $percentage)
          {
              array_push($performance_ranges_display,array(
                'range' => $ranges[$ctr],
                'percentage' => $percentage,
                'from' => $from[$ctr],
                'to' => $to[$ctr],
              ));

              ++$ctr;
          }
          $this->performance_ranges_display = $performance_ranges_display;
        }
      }

      return view('livewire.manager.scorecard-management');
    }

    public function save()
    {
        $total_hash = Hash::make($this->title.$this->type.$this->goal.$this->reference);

        DB::table('metrics')->insert([
          'title' => $this->title,
          'type' => $this->type,
          'goal' => $this->goal,
          'status' => 'Active',
          'reference' => $this->reference,
          'total_hash' => $total_hash,
        ]); 

        $metric_data = DB::table('metrics')
          ->select('id')
          ->where('total_hash',$total_hash)
        ->first();

        foreach($this->performance_ranges_display as $value)
        {
          DB::table('performance_ranges')->insert([
            'metricid' => $metric_data->id,
            'range' => $value['range'],
            'percentage' => $value['percentage'],
            'from' => $value['from'],
            'to' => $value['to'],
            ]); 
        }

      $alert = [
          'type'    => 'success',
          'message' => 'A section has been successfully added.'
      ];
      return redirect()->to('/admin/scorecard-management');
    }
}
