<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class DeactivatedAccounts extends Component
{
    public $show_inactive_users = false;
    public $inactive_users;

    public function render()
    {
        return view('livewire.deactivated-accounts');
    }

    // public function mount($userid)
    // {
    //   $this->userid = $userid;
    // }

    public function show()
    {      
        $inactive_users = DB::table('users')->where('status','Inactive')->get();
        dd($inactive_users->array);
        $this->show_inactive_users = true;
    }
}
