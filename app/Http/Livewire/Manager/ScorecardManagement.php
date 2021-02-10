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
    public $edit_id; //for editing metric purpose

    public $action; // add or edit
    public $page; // page shown
    public $title = 'gago';
    public $type = 'Time';
    public $type_last = 'Time';
    public $samplegoal = '00:05:00';
    public $goal = 300;
    public $references;
    public $reference = 'All';
    public $next; // enables/disables net button

    public $percentage1 = "175";
    public $percentage2 = "125";
    public $percentage3 = "100";
    public $percentage4 = "90";
    public $percentage5 = "80";

    public $performance_ranges_display = array();
    
    public function mount($metricid)
    {
      if($metricid == null)
      {
        $this->action = 'add';
        $this->page = 3;
        $this->reference = 'All';
        $this->type = 'Time';
        $this->type_last = 'Volume';
        $this->next = false;
      }
      else
      {
        $this->edit_id = $metricid;
        $this->action = 'edit';
        $this->page = 1;
        $this->next = false;
        $data['edit_metric'] = DB::table('metrics')
          ->where('id',$metricid)
          ->get();
        
        foreach($data['edit_metric'] as $metric_info)
        {
          $this->title = $metric_info->title;
          $this->type = $this->type_last = $metric_info->type;
          if($metric_info->type == 'Time')
            $this->samplegoal = ConvertingTime::convert_time($metric_info->goal);
          else
            $this->samplegoal = $metric_info->goal;
          $this->goal = $metric_info->goal;
          $this->reference = $metric_info->reference;

          $data['edit_perf_ranges'] = DB::table('performance_ranges')
            ->where('metricid',$metric_info->id)
            ->get();
          
          $count_perf = 0;
          foreach($data['edit_perf_ranges'] as $perf_ranges_info)
          {
            $percentage[$count_perf] = $perf_ranges_info->percentage;
            ++$count_perf;
          }
          $this->percentage1 = $percentage[0];
          $this->percentage2 = $percentage[1];
          $this->percentage3 = $percentage[2];
          $this->percentage4 = $percentage[3];
          $this->percentage5 = $percentage[4];
        }
      }
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
        $this->references = DB::table('task_lists')
          ->select('title')
          ->where('status','Active')
          ->where('type','Productive')
          ->get();

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
          $percentages = [];
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
              $base_time = (($this->goal / 100) * $percentage) - 1;
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
      if($this->action == 'add')
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
        
        if($this->type == 'Time')
        {
          foreach($this->performance_ranges_display as $value)
          {
            $from = ConvertingTime::convert_seconds($value['from']);
            $to = ConvertingTime::convert_seconds($value['to']);
            DB::table('performance_ranges')->insert([
              'metricid' => $metric_data->id,
              'range' => $value['range'],
              'percentage' => $value['percentage'],
              'from' => $from,
              'to' => $to,
              ]); 
          }
        }
        else
        {
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
        }
        session()->flash('success', 'Metric Added');
        return redirect()->to('/supervisor/scorecard-management');
      }
      else
      {
        $update_data = [
          'title' => $this->title,
          'type' => $this->type,
          'goal' => $this->goal,
          'status' => 'Active',
          'reference' => $this->reference,
        ];
        $update = DB::table('metrics')->where('id',$this->edit_id)->update($update_data);

        $data['get_perf_update'] = DB::table('performance_ranges')
          ->select('id')
          ->where('metricid',$this->edit_id)
          ->get();

        $perf_id_arr = [];
        foreach($data['get_perf_update'] as $perf_id)
        {
            $perf_id_arr[] = $perf_id->id;
        }
        
        if($this->type == 'Time')
        { 
          $ctr_perf_id = 0;
          foreach($this->performance_ranges_display as $value)
          {
            $from = ConvertingTime::convert_seconds($value['from']);
            $to = ConvertingTime::convert_seconds($value['to']);
              
            $update_data = [
              'range' => $value['range'],
              'percentage' => $value['percentage'],
              'from' => $from,
              'to' => $to,
            ];
            $update = DB::table('performance_ranges')
              ->where('metricid',$this->edit_id)
              ->where('id',$perf_id_arr[$ctr_perf_id])
              ->update($update_data);
            ++$ctr_perf_id;
          }
        }
        else
        {
          foreach($this->performance_ranges_display as $value)
          {
            $update_data = [
              'range' => $value['range'],
              'percentage' => $value['percentage'],
              'from' =>  $value['from'],
              'to' => $value['to'],
            ];
            $update = DB::table('performance_ranges')
              ->where('metricid',$this->edit_id)
              ->where('id',$perf_id_arr[$ctr_perf_id])
              ->update($update_data);
            ++$ctr_perf_id;
          }
        }
        session()->flash('success', 'Metric Updated');
        return redirect()->to('/supervisor/scorecard-management');
    }
  }
}
