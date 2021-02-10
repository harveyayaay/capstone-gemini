<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GettingPercentage extends Model
{
  public static function get_percentage($value, $reference)
  {
    // gets percentage 
    return ($value / $reference ) * 100;

  }
}
