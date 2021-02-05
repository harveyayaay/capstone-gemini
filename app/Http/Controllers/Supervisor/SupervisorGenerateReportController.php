<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupervisorGenerateReportController extends Controller
{
  public function index()
  {
     return view("supervisor.generate-report.index");
  }
}
