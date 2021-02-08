<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ManagerDashboardController extends Controller
{
  public function index()
  {
    
   $data = DB::table('performance_ranges')
    ->get();

    $data = DB::table('sessions')
    ->get();
      return view("manager.dashboard.index");
  }
}
