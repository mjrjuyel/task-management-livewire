<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $name;
    public $email;
    public $password;

    public $count = 0;

    public function increment(){
       $this->count++;
    }
    public function decrement(){
       $this->count--;
    }
    public function insert(){
       \App\Models\User::create([
        'name'=>$this->name,
        'email'=>$this->email,
        'password'=>Hash::make($this->password),
       ]);
       $this->reset(['name','email','password']);

       session()->flash('success','User Create Succesfully');
    }

    public function render()
    {
        $users = \App\Models\User::all();
        // dd($users);
        return view('livewire.user',compact(['users']));
    }
}
