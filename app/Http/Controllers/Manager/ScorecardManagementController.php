<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ConvertingTime;
use App\Models\GettingPercentage;


class ScorecardManagementController extends Controller
{
  
  public function index()
  {
    $user_scorecard = array();  
    $data['users'] = DB::table('users')
      ->select('id','firstname','lastname')
      ->where('position','Frontliner')
      ->where('status','Active')
      ->get();

    foreach($data['users'] as $user)
    {
      $overall = 0;
      $scorecard_details = array();

      $data['metrics_data'] = DB::table('metrics')
        ->where('status','Active')
        ->get();
      foreach($data['metrics_data'] as $metric)
      {
        if($metric->reference == 'All')
        {
          // Get All Activity
          $data['task_volume_actual'] = DB::table('tasks')
            ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
            ->select('tasks.*','task_lists.title')
            ->where('tasks.empid', $user->id)
            ->where('current_date','>=', date('Y-m-d',strtotime(date('Y-m'))))
            ->where('current_date','<', date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))))
            ->count();

          
          $data['task_goal'] = DB::table('metrics')
            ->select('goal','title','type','id')
            ->where('id',$metric->id)
            ->first();

          $result_percentage = number_format(GettingPercentage::get_percentage($data['task_volume_actual'],$data['task_goal']->goal), 2, '.', '');
         
          if($data['task_volume_actual'] > 0)
          {
            $data['score'] = DB::table('performance_ranges')
              ->select('range')
              ->where('metricid','=',$data['task_goal']->id)
              ->where('from','<=', $data['task_volume_actual'])
              ->where('to','>=', $data['task_volume_actual'])
              ->get();

            foreach($data['score'] as $score)
            {
              $score_data = $score->range;
            }
          }
          else
          {
            $score_data = 0;
          }
          $overall = $overall + $score_data;

          array_push($scorecard_details,array(
              "titles" => $data['task_goal']->title,
              "actuals" => $data['task_volume_actual'],
              "goals" => $data['task_goal']->goal,
              "percentages" => $result_percentage,
              "ranges" => $score_data,
          ));
        }
        else
        {
          // Get Specific Activity
          $data['task_volume_actual'] = DB::table('tasks')
            ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
            ->select('tasks.*','task_lists.title')
            ->where('task_lists.title', $metric->reference)
            ->where('tasks.empid', $user->id)
            ->where('current_date','>=', date('Y-m-d',strtotime(date('Y-m'))))
            ->where('current_date','<', date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))))
            ->count();
          
          $data['task_goal'] = DB::table('metrics')
            ->select('goal','title','type','id')
            ->where('id',$metric->id)
            ->first();


          $result_percentage = number_format(GettingPercentage::get_percentage($data['task_volume_actual'],$data['task_goal']->goal), 2, '.', '');
         
          if($data['task_volume_actual'] > 0)
          {
            $data['score'] = DB::table('performance_ranges')
              ->select('range')
              ->where('metricid','=',$data['task_goal']->id)
              ->where('from','<=', $data['task_volume_actual'])
              ->where('to','>=', $data['task_volume_actual'])
              ->get();

            foreach($data['score'] as $score)
            {
              $score_data = $score->range;
            }
          }
          else
          {
            $score_data = 0;
          }
          $overall = $overall + $score_data;

          array_push($scorecard_details,array(
              "titles" => $data['task_goal']->title,
              "actuals" => $data['task_volume_actual'],
              "goals" => $data['task_goal']->goal,
              "percentages" => $result_percentage,
              "ranges" => $score_data,
          ));
        }
      }

      // dd($scorecard_details);

      array_push($user_scorecard,array(
        "id" => $user->id,
        "name" => $user->firstname.' '.$user->lastname,
        "scorecard" => $scorecard_details,
        "overall" => $overall/3,
      ));
    }

    $records = array();

    $data1 = DB::table('metrics')
      ->where('status','Active')
      ->get();
      
    foreach($data1 as $value => $key)
    {
      $data2 = DB::table('performance_ranges')
        ->where('metricid',$key->id)
        ->get();

      array_push($records, array(
        "metric_record" => $key,
        "perf_record" => $data2,
      ));
    }

    if(Auth::user()->position == "Frontliner")
      return view("frontliner.scorecard-management.index",compact('records','user_scorecard'));
    else
      return view("manager.scorecard-management.index",compact('records','user_scorecard'));

  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
}
	