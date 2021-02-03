<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
      return view("manager.scorecard-management.index",compact('records'));
  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
}
