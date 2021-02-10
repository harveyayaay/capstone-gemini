<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConvertingTime;
use DB;
use PDF;

class PDFController extends Controller
{
  public $search;
  public $seconds;
  public $total = 0;
    public function indexActivity($reference, $status, $search, $date_from, $date_to)
    {
      if($search == 'none')
      {
        if($reference == 'All')
        {
            $data['tasks'] = DB::table('tasks')
              ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
              ->join('users','tasks.empid','=','users.id')
              ->select('tasks.*','task_lists.title','users.firstname','users.lastname')
              ->where('tasks.status','=',$status)
              ->where('tasks.current_date','>=',$date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
              ->get();
            foreach($data['tasks'] as $get_avg)
            {
              $this->seconds += ConvertingTime::convert_seconds($get_avg->process_duration);
              $this->total++;
            }
        }
        else
        {
            $data['tasks'] = DB::table('tasks')
              ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
              ->join('users','tasks.empid','=','users.id')
              ->select('tasks.*','task_lists.title','users.firstname','users.lastname')
              ->where('task_lists.title','=',$reference)
              ->where('tasks.status','=',$status)
              ->where('tasks.current_date','>=',$date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
              ->get();
            foreach($data['tasks'] as $get_avg)
            {
              $this->seconds += ConvertingTime::convert_seconds($get_avg->process_duration);
              $this->total++;
            }
        }
      }
      else
      {
        $this->search = $search;
        if($reference == 'All')
        {
            $data['tasks'] = DB::table('tasks')
              ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
              ->join('users','tasks.empid','=','users.id')
              ->select('tasks.*','task_lists.title','users.firstname','users.lastname')
              ->where(function($query){$query
                ->where('users.firstname','LIKE', "%" . $this->search . "%")
                ->orWhere('users.lastname','LIKE', "%" . $this->search . "%");
                })
              ->where('tasks.status','=',$status)
              ->where('tasks.current_date','>=',$date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
              ->get();
            foreach($data['tasks'] as $get_avg)
            {
              $this->seconds += ConvertingTime::convert_seconds($get_avg->process_duration);
              $this->total++;
            }
        }
        else
        {
            $data['tasks'] = DB::table('tasks')
              ->join('task_lists','tasks.task_lists_id','=','task_lists.id')
              ->join('users','tasks.empid','=','users.id')
              ->select('tasks.*','task_lists.title','users.firstname','users.lastname')
              ->where(function($query){$query
                ->where('users.firstname','LIKE', "%" . $search . "%")
                ->orWhere('users.lastname','LIKE', "%" . $search . "%");
                })
              ->where('task_lists.title','=',$reference)
              ->where('tasks.status','=',$status)
              ->where('tasks.current_date','>=',$date_from)
              ->where('tasks.current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
              ->get();
            foreach($data['tasks'] as $get_avg)
            {
              $this->seconds += ConvertingTime::convert_seconds($get_avg->process_duration);
              $this->total++;
            }
        }
      }
      $data['average'] = ConvertingTime::convert_time(intval($this->seconds / $this->total));
      $data['total'] = $this->total;
      $data['from'] = $date_from;
      $data['to'] = $date_to;
    $pdf = PDF::loadView('generate-pdf-activity',$data)->setPaper('legal', 'landscape');
    // $pdf = PDF::loadView('generate-pdf-activity',$data)->setPaper('legal', 'portrait');

    // html view 
    // return view('generate-pdf-activity',$data);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
    }
}
