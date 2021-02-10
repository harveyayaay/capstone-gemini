<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SettingsController extends Controller
{
  public function edit()
  {
      $data['profile'] = DB::table('users')
      ->where('id',Auth::user()->id)
      ->first();
      
      return view("settings.edit", compact('data'));
  }

  public function update(Request $request)
  {
    $update_data = [
        'firstname' => $request->firstname, 
        'lastname' => $request->lastname,
        'email' => $request->email,
        'contact' => $request->contact,
        'hiredate' => $request->hiredate,
        'position' => $request->position];
    $update = DB::table('users')->where('id',Auth::user()->id)->update($update_data);
    session()->flash('success', 'Profile Updated');

    if(Auth::user()->position = 'Manager')
      return redirect()->to('/admin/settings/edit');
    elseif(Auth::user()->position = 'Supervisor')
      return redirect()->to('/supervisor/settings/edit');
    else
      return redirect()->to('/frontliner/settings/edit');
  }
}
