<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
  public function import() 
  {
      Excel::import(new UsersImport, 'users.xlsx');
      
      return redirect('/')->with('success', 'All good!');
  }
}
