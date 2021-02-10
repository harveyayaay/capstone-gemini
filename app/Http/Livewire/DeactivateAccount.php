<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class DeactivateAccount extends Component
{
    public $userid;

    public function render()
    {
        return view('livewire.deactivate-account');
    }

    public function mount($userid)
    {
      $this->userid = $userid;
    }

    public function deact()
    {      
        $update_status = [
          'status' => 'Inactive'
        ];

        $store = DB::table('users')->where('id',$this->userid)->update($update_status);
        session()->flash('success', 'Employee Deactivated');
        return redirect()->to('/admin/employee-management');
    }
}
