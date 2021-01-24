<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'process_time',
      'sla',
      'level',
      'status',
    ];
}
