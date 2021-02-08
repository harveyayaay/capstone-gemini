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
    public $title = '';
    public $type;
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
      $this->page = 1;
      $this->reference = 'All';
      $this->type = 'Time';
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
      $ranges = [];
      $from = [];
      $to = [];
      if($this->page == 1)
      {
        $this->next = false;
        if($this->type == 'Time')
        {
          if(DateTime::createFromFormat('H:i:s', $this->samplegoal) && Str::length($this->title) > 0)
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
  
  
          // $total_hash = Hash::make($title.$type.$goal.$status);
          
          // DB::table('metrics')->insert([
          //   'title' => $title,
          //   'type' => $type,
          //   'goal' => $goal_seconds,
          //   'status' => $status,
          //   'total_hash' => $total_hash,
          // ]); 
  
          // $data = DB::table('metrics')
          //   ->select('id')
          //   ->where('total_hash',$total_hash)
          // ->first();
  
          $ctr = 0;
          foreach($percentages as $percentage)
          {
              array_push($performance_ranges_display,array(
                'range' => $ranges[$ctr],
                'percentage' => $percentage,
                'from' => ConvertingTime::convert_time($from[$ctr]),
                'to' => ConvertingTime::convert_time($to[$ctr]),
              ));
            // DB::table('performance_ranges')->insert([
            //   'metricid' => $data->id,
            //   'range' => $ranges[$ctr],
            //   'percentage' => $percentage,
            //   'from' => $from[$ctr],
            //   'to' => $to[$ctr],
            //   ]); 
  
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


    //   $this->ranges = array('3.0','2.5', '2.0', '1.5', '1.0');

    //   if($this->type == 'Time')
    //   {
    //     if(Str::of($this->goal)->length() > 7)
    //     {
    //       if (DateTime::createFromFormat('H:i:s', $this->goal)) 
    //       {
    //         $goal = strtotime($this->goal)-strtotime('00:00:00');
    //         if($goal > 86399)
    //         {
    //           $this->exceeds = true;
    //           $this->perf_ranges = false;
    //         }
    //         else
    //         {
    //           $this->exceeds = false;
    //           $goal_divided = intval($goal / 4);
            
    //           if($goal > 7)
    //           {
    //             $this->data_from_1 = ConvertingTime::convert_time($goal_divided * 4);
    //             $this->data_from_2 = ConvertingTime::convert_time($goal_divided * 3);
    //             $this->data_from_3 = ConvertingTime::convert_time($goal_divided * 2);
    //             $this->data_from_4 = ConvertingTime::convert_time($goal_divided * 1);
    //             $this->data_from_5 = ConvertingTime::convert_time($goal_divided * 0);

    //             $this->data_to_1 = 'above';
    //             $this->data_to_2 = ConvertingTime::convert_time(($goal_divided * 4) - 1);
    //             $this->data_to_3 = ConvertingTime::convert_time(($goal_divided * 3) - 1);
    //             $this->data_to_4 = ConvertingTime::convert_time(($goal_divided * 2) - 1);
    //             $this->data_to_5 = ConvertingTime::convert_time(($goal_divided * 1) - 1);

    //             $this->perf_record = array(
    //               "first" => array(
    //                   'range' => 3.0,
    //                   'from' => $this->data_from_1,
    //                   'to' => $this->data_to_1,
    //               ), 
    //               "second" => array(
    //                   'range' => 2.5,
    //                   'from' => $this->data_from_2,
    //                   'to' => $this->data_to_2,
    //               ), 
    //               "third" => array(
    //                   'range' => 2.0,
    //                   'from' => $this->data_from_3,
    //                   'to' => $this->data_to_3,
    //               ), 
    //               "fourth" => array(
    //                   'range' => 1.5,
    //                   'from' => $this->data_from_4,
    //                   'to' => $this->data_to_4,
    //               ), 
    //               "fifth" => array(
    //                   'range' => 1.0,
    //                   'from' => $this->data_from_5,
    //                   'to' => $this->data_to_5,
    //               )
    //             );
    //           }
    //           else
    //           {
    //             $this->data_from_5=$this->data_from_4=$this->data_from_3=$this->data_from_2=$this->data_from_1=$this->data_to_5=$this->data_to_4=$this->data_to_3=$this->data_to_2=$this->data_to_1= '00:00:00';
    //           }

    //           $this->perf_ranges = true;
    //         }
    //       }
    //       else
    //       {
    //         $this->perf_ranges = false;
    //       }
    //     }
    //     else
    //     {
    //       $this->perf_ranges = false;
    //     }
    //   }
    //   else if($this->type == 'Percentage')
    //   {
    //     // $this->goal = preg_replace('/\d/', '', $this->goal);
    //     $this->goal = preg_replace('/[^0-9]/', '', $this->goal);
    //     if($this->goal != null)
    //       $goal = intval($this->goal / 4);
    //     else  
    //       $goal = intval($this->goal);

        
    //     if($this->goal > 4 && $this->goal != null)
    //     {
    //       $this->perf_ranges = true;
    //       $this->data_from_1 = $goal * 4;
    //       $this->data_from_2 = $goal * 3;
    //       $this->data_from_3 = $goal * 2;
    //       $this->data_from_4 = $goal * 1;
    //       $this->data_from_5 = $goal * 0;
  
    //       $this->data_to_1 = 'above';
    //       $this->data_to_2 = ($goal * 4) - 1;
    //       $this->data_to_3 = ($goal * 3) - 1;
    //       $this->data_to_4 = ($goal * 2) - 1;
    //       $this->data_to_5 = ($goal * 1) - 1;

    //       $this->perf_record = array(
    //           "first" => array(
    //               'range' => 3.0,
    //               'from' => $this->data_from_1,
    //               'to' => $this->data_to_1,
    //           ), 
    //           "second" => array(
    //               'range' => 2.5,
    //               'from' => $this->data_from_2,
    //               'to' => $this->data_to_2,
    //           ), 
    //           "third" => array(
    //               'range' => 2.0,
    //               'from' => $this->data_from_3,
    //               'to' => $this->data_to_3,
    //           ), 
    //           "fourth" => array(
    //               'range' => 1.5,
    //               'from' => $this->data_from_4,
    //               'to' => $this->data_to_4,
    //           ), 
    //           "fifth" => array(
    //               'range' => 1.0,
    //               'from' => $this->data_from_5,
    //               'to' => $this->data_to_5,
    //           )
    //       );
    //     }
    //     else
    //     {
    //       $this->data_from_1 = $this->data_from_2 = $this->data_from_3 = $this->data_from_4 = $this->data_from_5 = $this->data_to_1 = $this->data_to_2 =  $this->data_to_3 =  $this->data_to_4 =  $this->data_to_5 = 0;
    //     }
    //   }

    //   $this->references['task_lists'] = DB::table('task_lists')
    //     ->where('type', 'Productive')
    //     ->where('status', 'Active')
    //     ->get();

      return view('livewire.manager.scorecard-management');
    }

    public function save()
    {
      dd($this->perf_record);

      $store_data = [
          'title' => $this->title, 
          'type' => $this->type,
          'goal' => $this->goal,
          'status' => 'Active',
          'reference' => $this->reference,
          'total_hash' => Hash::make($this->title.$this->type.$this->goal.$this->reference),
        ];
      $store = DB::table('metrics')->insert($store_data);

      $get_data = DB::table('metrics')
          ->where('total_hash', $store_data['total_hash'])
          ->first();

      foreach ($this->perf_record as $key => $value) 
      {
        $store_data_2 = [
          'metricid' => $get_data->id, 
          'range' => $value['range'],
          'from' => $value['from'],
          'to' => $value['to'],
        ];

        $store = DB::table('performance_ranges')->insert($store_data_2);
      }

      $alert = [
          'type'    => 'success',
          'message' => 'A section has been successfully added.'
      ];
      return redirect()->to('/admin/scorecard-management');
    }
}
