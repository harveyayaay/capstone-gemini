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
}
