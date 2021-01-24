<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityMonitoringController extends Controller
{
  public function index()
  {
    return view("supervisor.activity-monitoring.index");
  }
}
