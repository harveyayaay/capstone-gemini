<?php

namespace App\Http\Controllers\Frontliner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontlinerDashboardController extends Controller
{
  public function index()
  {
      return view("frontliner.dashboard.index");
  }
}
