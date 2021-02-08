<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class ManagerDashboardController extends Controller
{
  public function index()
  {
    
   $data = DB::table('performance_ranges')
    ->get();

    $data = DB::table('sessions')
    ->get();
    
    // dd($data);

     return view("manager.dashboard.index");
  }
}
