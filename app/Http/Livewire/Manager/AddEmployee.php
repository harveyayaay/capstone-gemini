<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddEmployee extends Component
{
  public $contact;
  public $firstname;
  public $lastname;
  public $hiredate;
  public $position;
  public $email;
  public $contact_error_message;
  public $email_error_message;
  public $validation_contact;
  public $validation_email;
  public $password;
  public $username;
  public $data_stored;

    protected $rules = [
        'email' => 'required|email',
        'contact' => 'required|min:11|max:11',
    ];

    public function render()
    {
        return view('livewire.manager.add-employee');
    }
    
    public function mount()
    {
      $this->validation = false;
      $this->contact_error_message = '';
      $this->email_error_message = '';
      $this->data_stored = false;
      $this->position = 'Frontliner';
    }

    public function submit()
    {
      $this->validate();
      
      $data['contact'] = DB::table('users')
        ->where('contact', $this->contact)
        ->first();

      if($data['contact'])
      {
        $this->validation_contact = false;
        $this->contact_error_message = '(Number is Already Taken)';
      }
      else
      {
        $this->validation_contact = true;
        $this->contact_error_message = '';
      }

      
      $data['email'] = DB::table('users')
        ->where('email', $this->email)
        ->first();

      if($data['email'])
      {
        $this->validation_email = false;
        $this->email_error_message = '(Email is Already Taken)';
      }
      else
      {
        $this->validation_email = true;
        $this->email_error_message = '';
      }
        
      // Execution doesn't reach here if validation fails.

      if($this->validation_contact === true && $this->validation_email === true)
      {
        $data['users'] = DB::table('users')
          ->select('username')
          ->where('username',preg_replace('/[^a-zA-Z0-9]/', '', str_replace(' ', '', Str::lower($this->firstname.''.$this->lastname))))
          ->first();

        $ctr = 0;
        while($data['users'] != null){
          $ctr++;
          $data['users'] = DB::table('users')
            ->select('username')
            ->where('username','admin')
            ->where('username',preg_replace('/[^a-zA-Z0-9]/', '', str_replace(' ', '', Str::lower($this->firstname.''.$this->lastname))))
            ->first();
        }
        $username = preg_replace('/[^a-zA-Z0-9]/', '', str_replace(' ', '', Str::lower($this->firstname.''.$this->lastname)));
        
        if($ctr > 0)
          $username .= $ctr;

        $store_data = [
            'firstname' => $this->firstname, 
            'lastname' => $this->lastname,
            'username' => $username,
            'email' => $this->email,
            'contact' => $this->contact,
            'hiredate' => $this->hiredate,
            'position' => $this->position,
            'status' => 'Active',
            'password' => Hash::make('qwe123!@#QWE'),
          ];
        $store = DB::table('users')->insert($store_data);

        $data['get_id'] = DB::table('users')
          ->select('id')
          ->where('username', $username)
          ->first();
          
        $store_data = [
          'empid' => $data['get_id']->id,
          'percentage' => 100.00, 
        ];
        $store = DB::table('qa_list')->insert($store_data);

        $store_data = [
          'escalation' => 0, 
          'empid' => $data['get_id']->id,
        ];
        $store = DB::table('escalations')->insert($store_data);
        
        $this->username = $username;
        $this->password = 'qwe123!@#QWE';

        $this->data_stored = true;
      }

    }




    
}
