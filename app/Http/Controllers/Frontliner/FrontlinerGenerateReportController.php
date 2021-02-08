<?php

namespace App\Http\Controllers\Frontliner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontlinerGenerateReportController extends Controller
{
  public function index()
  {
     return view("frontliner.generate-report.index");
  }
}
