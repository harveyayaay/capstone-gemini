<?php

namespace App\Models\Supervisor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'current_date',
    'type',
    'case_num',
    'date_received',
    'time_start',
    'time_hold',
    'time_continue',
    'time_end',
    'process_duration',
    'hold_duration',
    'status',
    'empid',
  ];
}