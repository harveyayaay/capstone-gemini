<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertingTime extends Model
{
    public static function convert_time($value)
    {
      //converting seconds to time format.
      $hours = intval($value/3600);
      $value = $value - ($hours * 3600);

      $minutes = intval($value/60);
      $seconds = $value - ($minutes * 60);

      return date('H:i:s', strtotime($hours.':'.$minutes.':'.$seconds));
    }
    public static function convert_seconds($value)
    {
      //converting time format to seconds.
      $parts = explode(":", $value);

      $seconds = $parts[0] * 3600;
      $seconds += $parts[1] * 60;
      $seconds += $parts[2];

      return $seconds;
    }
}
