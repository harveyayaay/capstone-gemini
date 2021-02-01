<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function indexActivity($reference, $status, $date_from, $date_to)
    {
        if($reference == 'All')
        {
            $data['tasks'] = DB::table('tasks')
                ->where('status','=',$status)
                ->where('current_date','>=',$date_from)
                ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
                ->get();
        }
        else
        {
            $data['tasks'] = DB::table('tasks')
                ->where('type','=',$reference)
                ->where('status','=',$status)
                ->where('current_date','>=',$date_from)
                ->where('current_date','<',date('Y-m-d', strtotime('+1 day',strtotime($date_to))))
                ->get();
        }
    $pdf = PDF::loadView('generate-pdf-activity',$data)->setPaper('legal', 'landscape');
    // $pdf = PDF::loadView('generate-pdf-activity',$data)->setPaper('legal', 'portrait');

    // html view 
    // return view('generate-pdf-activity',$data);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
    }
}
