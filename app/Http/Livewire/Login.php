<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $error = '';
    public $email = '';
    public $password = '';

    // protected $rules = ;


    public function handleSubmit(Request $request)
    {
       $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
        
        $auth = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($auth) {
            $request->session()->regenerate();
            return redirect(route('home'));
        }else{
            $this->email = '';
            $this->password = '';
            return $this->error = 'Invalid credentials';
        }
        
    }

}
