<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ConvertingTime;

class ManagerDashboardController extends Controller
{
  public function index()
  {
    $data['sched_display'] = '';
    if(Auth::user()->position == 'Frontliner')
      return view("frontliner.dashboard.index");
    else  
      return view("manager.dashboard.index");
  }
}
