<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsManagementController extends Controller
{
  public function index()
  {
     return view("manager.reports-management.index");
  }
  public function add()
  {
     return view("manager.reports-management.add");
  }
}
