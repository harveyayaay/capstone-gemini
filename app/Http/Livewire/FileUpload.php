<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use DB;

class FileUpload extends Component
{
  public $photo;
  public $userid;
  public $photo_exists = false;
  public $photo_path;

    public function render()
    {
      return view('livewire.file-upload');
    }

    use WithFileUploads;

    

    public function mount($userid)
    {
      $this->userid = $userid;
      $data['users'] = DB::table('users')->where('id',$this->userid)->first();
      $data['users']->profile_photo_path ? $this->photo_exists = true : $this->photo_exists = false;
      $this->photo_path = $data['users']->profile_photo_path;
    }

    public function save()
    {      

        // $this->validate([
        //     'photo' => 'image|max:1024', // 1MB Max
        // ]);
        // $update_photo = [
        //   'profile_photo_path' => $this->photo->store('photos'),
        // ];
          dd('i aint tisoy, im pinoy');

        $store = DB::table('users')->where('id',$this->userid)->update($update_photo);
    }
}
