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
      $data['photo'] = DB::table('users')
        ->where('id',$this->userid)
        ->get();

      foreach($data['photo'] as $photo)
      {
        $this->photo_path = $photo->profile_photo_path;
      }
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
        $this->validate([
            'photo' => 'image|mimes:jpg,png', // 1MB Max
        ]);

        if($this->fails()) 
        {
           return redirect()->back()->session()->flash('danger', 'Error Uploading File');
        }
        else 
        {
          $update_photo = [
            'profile_photo_path' => $this->photo->store('photos'),
          ];
  
          $store = DB::table('users')->where('id',$this->userid)->update($update_photo);
  
          session()->flash('success', 'Employee Profile Updated');
          return redirect()->to('/admin/employee-management/edit/'.$this->userid);
        }
    }

  //   public function createProduct(){

  //     $validatedData = $this->validate($this->data);

  //     $formData = [
  //         'photo_path' => $this->photo_path->store('photos'),
  //         'title' => $this->title,
  //         'description' => $this->description,
  //         'status' => $this->status,
  //         'price' => $this->price,
  //         'number_available' => $this->number_available,
  //         'product_category_id' => $this->product_category_id
  //     ];

  //     Product::create($formData);

  //     session()->flash('message', 'product created successfully');
  //     return redirect()->to('/product/create');

  // }
}
// $val = Validator:make($request->all, [
//   'imgUpload1' => 'required',
// ]);

// if($val->fails()) {
//  return redirect()->back()->with(['message' => 'No file received']);
// }
// else {
//   $file = $request->file('imgUpload1')->store('images');
//   return redirect()->back();
// }