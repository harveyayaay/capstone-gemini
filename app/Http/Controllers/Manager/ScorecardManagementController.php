<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScorecardManagementController extends Controller
{
  public function index()
  {
     return view("manager.scorecard-management.index");
  }
  public function add()
  {
     return view("manager.scorecard-management.add");
  }
}
