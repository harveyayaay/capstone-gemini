<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertingTime extends Model
{
    public static function convert_time($time)
    {
      //converting seconds to minutes.
      $hours = intval($time/3600);
      $time = $time - ($hours * 3600);

      $minutes = intval($time/60);
      $seconds = $time - ($minutes * 60);

      
      return date('H:i:s', strtotime($hours.':'.$minutes.':'.$seconds));
    }
}
