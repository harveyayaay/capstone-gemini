<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleManagementController extends Controller
{
  public function index()
  {
     return view("manager.schedule-management.index");
  }

  public function add(Request $request, $date)
  {
    $data['date'] = $date;
     return view("manager.schedule-management.add", $data);
  }
  
  public function show(Request $request, $date)
  {
    $data['date'] = $date;
     return view("manager.schedule-management.show", $data);
  }
}
