<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
  public function index()
  {
    // $data['task_list_table'] = DB::select('select * from task_list_table');
     return view("manager.dashboard.index");
  }
}
