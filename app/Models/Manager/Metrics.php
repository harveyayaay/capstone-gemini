<?php

namespace App\Models\Manager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metrics extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'type',
      'goal',
      'reference',
      'status',
    ];
}
