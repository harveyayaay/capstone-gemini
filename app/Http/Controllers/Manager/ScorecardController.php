<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ScorecardController extends Controller
{
  public function index()
  {
     return view("manager.scorecard.index");
  }
}
