<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorDashboardController extends Controller
{
  public function index()
  {
    // $data['task_list_table'] = DB::select('select * from task_list_table');
     return view("supervisor.dashboard.index");
  }
}
