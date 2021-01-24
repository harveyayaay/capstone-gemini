<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
  use HasFactory;

  protected $table ='task_list_table';
  protected $fillable = [
      'title', 'process_time', 'sla', 'level',
  ];
}
