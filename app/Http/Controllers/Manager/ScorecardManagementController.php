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
      return view("frontliner.scorecard-management.index",compact('records'));
    else
      return view("manager.scorecard-management.index",compact('records'));

    //   if(Auth::user()->position == "Frontliner")
    //   return view("frontliner.scorecard-management.index",compact('records','user_scorecard'));
    // else
    //   return view("manager.scorecard-management.index",compact('records','user_scorecard'));

  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
}
	