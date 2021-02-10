<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class Notifications extends Component
{
    public $notifs;
    public $count;

    public $notifid;
    public $empid;
    public $seen;
    public $read;

    public function render()
    {
      if($this->seen == true)
      {
        $update_data = [
          'seen' => $this->seen, 
        ];
        $update = DB::table('notifications')->where('empid',$this->empid)->update($update_data);
      }

      $data['notifs'] = DB::table('notifications')
        ->where('empid',Auth::user()->id)
        ->get();

        
      $data['count'] = DB::table('notifications')
        ->where('empid',Auth::user()->id)
        ->count();
      
      foreach($data['notifs'] as $notifs)
      {
          $this->notifid = $notifs->id;
          $this->empid = $notifs->empid;
          $this->seen = $notifs->seen;
          $this->read = $notifs->read;
      }

      $this->notifs = $data['notifs'];
      $this->count = $data['count'];
      return view('livewire.notifications');
    }

    public function seen()
    {
      $this->seen = true;
    }
}
