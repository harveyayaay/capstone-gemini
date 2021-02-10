<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;

class Notifications extends Component
{
    public $notifs;
    public function render()
    {
      $data['notifs'] = DB::table('notifications')
        ->where('empid',Auth::user()->id)
        ->get();

      $this->notifs = $data['notifs'];
      return view('livewire.notifications');
    }
}
