<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class EmployeeManagementController extends Controller
{
  public function index()
  {
    $data['users'] = DB::table('users')
      ->where('position','!=','Manager')
      ->get();
    return view("manager.employee-management.index", $data);
  }

  public function add()
  {
      return view("manager.employee-management.add");
  }

  public function store(Request $request)
  {
    
  }
  
  public function edit($id)
  {
      DB::table('users')->where('id',$id)->where('status','Active')->first() ? $data['data'] = DB::table('users')->where('id',$id)->first()  : abort(404);
      return view("manager.employee-management.edit", $data);
  }

  public function update(Request $request,$id)
  {
    $update_data = [
        'firstname' => $request->firstname, 
        'lastname' => $request->lastname,
        'email' => $request->email,
        'contact' => $request->contact,
        'hiredate' => $request->hiredate,
        'position' => $request->position];
    $update = DB::table('users')->where('id',$id)->update($update_data);
    $alert = [
        'type'    => 'success',
        'message' => 'A section has been successfully added.'
    ];
    return redirect()->to('/admin/employee-management')->with('alert',$alert);
  }
}
