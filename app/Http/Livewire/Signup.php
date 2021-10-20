<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signup extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required'
    ];

    public function render()
    {
        return view('livewire.signup');
    }

    public function handleSubmit(){
        $this->validate();

        $hashPassword = Hash::make($this->password);
        $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $hashPassword,
                ]);
        
        if($user){
            return redirect(route("login"));
        }else{
            return;
        }
    }

}
