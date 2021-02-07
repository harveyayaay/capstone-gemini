<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


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
      $scorecard_details = array();
      // $title = [];
      // $actual = [];
      // $goal = [];
      
      // Get Average Application
      $data['task_volume_actual'] = DB::table('tasks')
        ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
        ->select('tasks.*','task_lists.title')
        ->where('task_lists.title','Application')
        ->where('tasks.empid', $user->id)
        ->where('current_date','>=', date('Y-m-d',strtotime(date('Y-m'))))
        ->where('current_date','<', date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))))
        ->count();

      $data['task_goal'] = DB::table('metrics')
        ->select('goal','title')
        ->where('id',1)
        ->first();

      // $title[] = $data['task_goal']->title;
      // $actual[] = $data['task_volume_actual'];
      // $goal[] = $data['task_goal']->goal;

      array_push($scorecard_details,array(
          "titles" => $data['task_goal']->title,
          "actuals" => $data['task_volume_actual'],
          "goals" => $data['task_goal']->goal,
      ));

      // Get Average AMIE
      $data['task_volume_actual'] = DB::table('tasks')
        ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
        ->select('tasks.*','task_lists.title')
        ->where('task_lists.title','AMIE')
        ->where('tasks.empid', $user->id)
        ->where('current_date','>=', date('Y-m-d',strtotime(date('Y-m'))))
        ->where('current_date','<', date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))))
        ->count();

      $data['task_goal'] = DB::table('metrics')
        ->select('goal','title')
        ->where('id',2)
        ->first();

      
      array_push($scorecard_details,array(
        "titles" => $data['task_goal']->title,
        "actuals" => $data['task_volume_actual'],
        "goals" => $data['task_goal']->goal,
      ));

      // Get Volume All
      $data['task_volume_actual'] = DB::table('tasks')
        ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
        ->select('tasks.*','task_lists.title')
        ->where('tasks.empid', $user->id)
        ->where('current_date','>=', date('Y-m-d',strtotime(date('Y-m'))))
        ->where('current_date','<', date('Y-m-d',strtotime('+1 day', strtotime(date('Y-m-d')))))
        ->count();

      $data['task_goal'] = DB::table('metrics')
        ->select('goal','title')
        ->where('id',3)
        ->first();

      array_push($scorecard_details,array(
        "titles" => $data['task_goal']->title,
        "actuals" => $data['task_volume_actual'],
        "goals" => $data['task_goal']->goal,
      ));
      
      array_push($user_scorecard,array(
        "name" => $user->firstname.' '.$user->lastname,
        "scorecard" => $scorecard_details,
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
    return view("manager.scorecard-management.index",compact('records','user_scorecard'));
  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
}
