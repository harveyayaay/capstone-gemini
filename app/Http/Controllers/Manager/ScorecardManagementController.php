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
      $qa_details = array();
      $esc_details = array();

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
              "type" => $data['task_goal']->type,
              "type" => $data['task_goal']->type,
              "actuals" => $data['task_volume_actual'],
              "actuals_time" => ConvertingTime::convert_time($data['task_volume_actual']),
              "goals" => $data['task_goal']->goal,
              "goals_time" => ConvertingTime::convert_time($data['task_goal']->goal),
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
              "type" => $data['task_goal']->type,
              "actuals" => $data['task_volume_actual'],
              "actuals_time" => ConvertingTime::convert_time($data['task_volume_actual']),
              "goals" => $data['task_goal']->goal,
              "goals_time" => ConvertingTime::convert_time($data['task_goal']->goal),
              "percentages" => $result_percentage,
              "ranges" => $score_data,
          ));
        }
      }
      
      // Quality Assurance
      $data['qa'] = DB::table('qa_list')
        ->where('empid',$user->id)
        ->first();

      if($data['qa'] == null)
      {
        DB::table('qa_list')->insert([
          'empid' => $user->id,
          'percentage' => 100,
          ]); 
        $qa_actual = 100;
      }
      else
      {
        $qa_actual = $data['qa']->percentage;
      }

      $data['qa_reference'] = DB::table('qa_reference')
        ->orderBy('percentage', 'asc')
        ->get();

      $qa_score = 0;
      $qa_goal = 0;
      $qa_percentage = 0;
      foreach($data['qa_reference'] as $value)
      {

        if($value->percentage > $qa_goal)
          $qa_goal = $value->percentage;

        if($value->percentage <= $qa_actual)
        {
          $qa_score = $value->score;
          $qa_percentage = $value->percentage;
        }
      }
      
      $this->qa_actual = $qa_actual;
      array_push($qa_details,array(
        "titles" => 'Quality Assurance',
        "actuals" => $qa_actual,
        "goals" => $qa_goal,
        "percentages" => $qa_percentage,
        "ranges" => $qa_score,
      ));

      // Escalations
      $data['escalations'] = DB::table('escalations')
        ->where('empid',$user->id)
        ->first();

      if($data['escalations'] == null)
        $esc_actual = 0;
      else
        $esc_actual = $data['escalations']->escalation;

      $this->esc_actual = $esc_actual;
      array_push($esc_details,array(
        "titles" => 'Escalations',
        "actuals" => $esc_actual,
        "goals" => 0,
      ));

      $total_score_from_scorecard = 0;
      $count_metrics = 0;
      foreach($scorecard_details as $get_scores)
      {
        $total_score_from_scorecard += $get_scores['ranges'];
        ++$count_metrics;
      }
      
      foreach($qa_details as $get_additional_scores)
      {
        $total_score_from_scorecard += $get_additional_scores['ranges'];
        ++$count_metrics;
      }

      $average_score_from_scorecard = $total_score_from_scorecard/$count_metrics;
      if($esc_actual == 1)
        $overall_score_from_scorecard = ($average_score_from_scorecard / 100) * 80; //get 80%, 20% deduction
      elseif($esc_actual > 1)
        $overall_score_from_scorecard = 1; //* 80; get 80%, 20% duduction
      else
        $overall_score_from_scorecard = $average_score_from_scorecard;

      array_push($user_scorecard,array(
        "id" => $user->id,
        "name" => $user->firstname.' '.$user->lastname,
        "scorecard" => $scorecard_details,
        "qa" => $qa_details,
        "esc" => $esc_details,
        "overall" => $overall_score_from_scorecard,
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
    
    // if(Auth::user()->position == "Frontliner")
    //   return view("frontliner.scorecard-management.index",compact('records'));
    // else
    //   return view("manager.scorecard-management.index",compact('records'));

      if(Auth::user()->position == "Frontliner")
      return view("frontliner.scorecard-management.index",compact('records','user_scorecard'));
    else
      return view("manager.scorecard-management.index",compact('records','user_scorecard'));

  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
  public function edit($metricid)
  {
     return view("manager.scorecard-management.edit", compact('metricid'));
  }
}
	