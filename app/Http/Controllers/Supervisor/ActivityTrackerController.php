<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supervisor\Task;
use DB;

class ActivityTrackerController extends Controller
{ 
  public function index()
  {
    if(date('Y-m-d H:i:s') > date('Y-m-d 18:00:00'))
    {
      // ngayon at bukas
      $date_from = date('Y-m-d 18:00:00');
      $date_to = date('Y-m-d 09:00:00', strtotime('+1 day', strtotime(date('Y-m-d'))));
    }
    else
    {
      // kahapon at ngayon
      $date_from = date('Y-m-d 18:00:00', strtotime('-1 day', strtotime(date('Y-m-d'))));
      // $date_to = date('Y-m-d 9:00:00');
      $date_to = date('Y-m-d 18:00:00');
    }

    $data['countOngoing'] = DB::table('tasks')
      ->where('status','=','Ongoing')
      ->where('empid','=',Auth::id())
      ->count();

    if($data['countOngoing'] > 0)
    {
      $data['tasks'] = DB::table('tasks')
        ->join('task_lists', 'tasks.task_lists_id','=','task_lists.id')
        ->select('tasks.*', 'task_lists.title')
        ->where('tasks.status','=','Ongoing')
        ->where('tasks.current_date','>=',$date_from)
        ->where('tasks.current_date','<=',$date_to)
        ->where('tasks.empid','=',Auth::id())
        ->get();
    }
    else
    {
      $data['countHold'] = DB::table('tasks')
      ->where('status','=','Hold')
      ->where('current_date','>=',$date_from)
      ->where('current_date','<=',$date_to)
      ->where('empid','=',Auth::id())
      ->count();

      $data['countComplete'] = DB::table('tasks')
      ->where('status','=','Completed')
      ->where('current_date','>=',$date_from)
      ->where('current_date','<=',$date_to)
      ->where('empid','=',Auth::id())
      ->count();

      $data['tasks'] = DB::table('tasks')
      ->join('task_lists', 'tasks.task_lists_id','=','task_lists.id')
      ->select('tasks.*', 'task_lists.title')
      ->where('tasks.current_date','>=',$date_from)
      ->where('tasks.current_date','<=',$date_to)
      ->where('tasks.empid','=',Auth::id())
      ->get();
    }

    if(Auth::user()->position == 'Frontliner')
      return view("frontliner.activity-tracker.index", $data);
    else 
      return view("supervisor.activity-tracker.index", $data);

  }

  public function store(Request $request)
  {
     $store_data = [
          'current_date' => date('Y-m-d H:i:s'),
          'task_lists_id' => $request->type,
          'case_num' => $request->case_num,
          'date_received' => $request->date_received,
          'time_start' => date('Y-m-d H:i:s'),
          'time_continue' => date('Y-m-d H:i:s'),
          'time_end' => date('Y-m-d H:i:s'),
          'process_duration' => '00:00:00',
          'hold_duration' => '00:00:00',
          'status' => 'Ongoing',
          'empid' => Auth::id(),
        ];
        $store = DB::table('tasks')->insert($store_data);
        $alert = [
            'type'    => 'success',
            'message' => 'A section has been successfully added.'
        ];
        
    if(Auth::user()->position == 'Frontliner')
      return redirect()->to('/frontliner/activity-tracker')->with('alert',$alert);
    else 
      return redirect()->to('/supervisor/activity-tracker')->with('alert',$alert);
      
  }
  
  public function update(Request $request, $id, $status)
  {
    // store

    if($status == 'Hold' || $status == 'Completed' || $status == 'Incomplete')
    {
      $data = Task::find($id);
      $data->time_end = date('Y-m-d H:i:s');
      //getting time difference in seconds.
      $SecondsStartHold=strtotime($data->time_end)-strtotime($data->time_start);
      //converting seconds to minutes.
      $hourDifference = intval($SecondsStartHold/3600);
      $remainingSeconds = $SecondsStartHold - ($hourDifference * 3600);

      $minDifference = intval($remainingSeconds/60);
      $remainingSeconds = $remainingSeconds - ($minDifference * 60);

      // (start + hold) - hold_duration
      $secondsProcessedTime=strtotime(date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds)))-strtotime($data->hold_duration);
      
      //converting seconds to minutes.
      $hourDifference = intval($secondsProcessedTime/3600);
      $remainingSeconds = $secondsProcessedTime - ($hourDifference * 3600);

      $minDifference = intval($remainingSeconds/60);
      $remainingSeconds = $remainingSeconds - ($minDifference * 60);

      $data->process_duration = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));

      if($status == 'Hold')
        $data->status = 'Hold';
      else if($status == 'Completed')
        $data->status = 'Completed';
      else 
        $data->status = 'Incomplete';
      
      $data->save();
    }
    else if($status == 'Continue')
    {
      $data = Task::find($id);
      $data->time_continue = date('Y-m-d H:i:s');
      //getting time difference in seconds.
      $SecondsStartContinue=strtotime($data->time_continue)-strtotime($data->time_start);
      //converting seconds to minutes.
      $hourDifference = intval($SecondsStartContinue/3600);
      $remainingSeconds = $SecondsStartContinue - ($hourDifference * 3600);

      $minDifference = intval($remainingSeconds/60);
      $remainingSeconds = $remainingSeconds - ($minDifference * 60);

      // (start + hold) - hold_duration
      $secondsHoldTime=strtotime(date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds)))-strtotime($data->process_duration);
      
      //converting seconds to minutes.
      $hourDifference = intval($secondsHoldTime/3600);
      $remainingSeconds = $secondsHoldTime - ($hourDifference * 3600);

      $minDifference = intval($remainingSeconds/60);
      $remainingSeconds = $remainingSeconds - ($minDifference * 60);

      $data->hold_duration = date('H:i:s', strtotime($hourDifference.':'.$minDifference.':'.$remainingSeconds));

      $data->status = 'Ongoing';
      $data->save();
    }
    

    // redirect
    $alert = [
      'type'    => 'success',
      'message' => 'A section has been successfully updated.'
    ];
    if(Auth::user()->position == 'Frontliner')
      return redirect()->to('/frontliner/activity-tracker')->with('alert',$alert);
    else 
      return redirect()->to('/supervisor/activity-tracker')->with('alert',$alert);

  }
  
}
