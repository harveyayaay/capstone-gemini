<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tracker;
use DB;
class TrackerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $data['task_list_table'] = TrackerManagement::where('key', 'LIKE', '%aboutus%')->get();
      // return view("admin.settings.about-us.index", $data);
      $data['task_list_table'] = DB::select('select * from task_list_table');
      // return view("manager.tracker-management.index", $data);
      // $task_list_table = TrackerManagement::get();
       return view("manager.tracker-management.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view("manager.tracker-management.add_edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->validate([$request->field_title=>'required'])){
            $store_data = [
                'title' => $request->field_title, 
                'process_time' => $request->field_process_time,
                'sla' => $request->field_sla,
                'level' => $request->field_level];
            $store = DB::table('task_list_table')->insert($store_data);
            $alert = [
                'type'    => 'success',
                'message' => 'A section has been successfully added.'
            ];
            return redirect()->route('manager.tracker-management.index')->with('alert',$alert);
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
        $data['task_list_table'] = DB::table('task_list_table')->where('id',$id)->first();
        return view("manager.tracker-management.add_edit", $data);
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
            'level' => $request->field_level];
        $update = DB::table('task_list_table')->where('id',$id)->update($update_data);
        $alert = [
            'type'    => 'success',
            'message' => 'A section has been successfully added.'
        ];
        return redirect()->route('manager.tracker-management.index')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // $alerzt()->route('manager.tracker-management.index')->with('alert',$alert);
      // $delete = DB::table('task_list_table')->where('id',$id)->delete();
      // $alert = [
      //     'type'    => 'danger',
      //     'message' => 'Approval message successfully deleted.'
      // ];
      // return redirect()->route('manager.tracker-management.index')->with('alert',$alert);
    }
}
