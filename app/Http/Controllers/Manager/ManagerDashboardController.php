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
      

     return view("manager.dashboard.index");
  }
}
