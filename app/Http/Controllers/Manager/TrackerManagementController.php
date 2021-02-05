<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager\TrackerManagement;
use DB;
class TrackerManagementController extends Controller
{
    public function index()
    {
    //   $data['task_list_table'] = TrackerManagement::where('status', '=', 'Active')->get();
      // return view("admin.settings.about-us.index", $data);
      $data['prod'] = DB::table('task_lists')
          ->where('status','Active')
          ->where('type','Productive')
          ->get();
        
      $data['non_prod'] = DB::table('task_lists')
          ->where('status','Active')
          ->where('type','Non-productive')
          ->get();

      // return view("manager.tracker-management.index", $data);
      // $task_list_table = TrackerManagement::get();
       return view("manager.tracker-management.index", $data);
    }

    public function add()
    {
        return view("manager.tracker-management.add");
    }

    public function store(Request $request)
    {
      // if($request->validate([$request->field_title=>'required'])){
      $store_data = [
          'title' => $request->field_title, 
          'process_time' => $request->field_process_time,
          'sla' => $request->field_sla,
          'level' => $request->field_level,
          'type' => $request->field_type,
          'status' => 'Active'
        ];
      $store = DB::table('task_lists')->insert($store_data);
      $alert = [
          'type'    => 'success',
          'message' => 'A section has been successfully added.'
      ];
      return redirect()->to('/admin/tracker-management')->with('alert',$alert);
      // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['task_list_table'] = DB::table('task_lists')->where('id',$id)->first();
        return view("manager.tracker-management.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $update_data = [
            'title' => $request->field_title, 
            'process_time' => $request->field_process_time,
            'sla' => $request->field_sla,
            'level' => $request->field_level,
            'status' => $request->field_status];
        $update = DB::table('task_lists')->where('id',$id)->update($update_data);
        $alert = [
            'type'    => 'success',
            'message' => 'A section has been successfully added.'
        ];
        return redirect()->to('/admin/tracker-management')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
