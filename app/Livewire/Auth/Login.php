<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $loginForm;

    public function login()
    {
        $this->validate();

        try {

            if(Auth::attempt(['email' => $this->loginForm->email, 'password' => $this->loginForm->password], $this->loginForm->remember)){
                return redirect()->route('links.index');
            }

            session()->flash('message', 'Email or password is wrong.');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong.');
        }
    }

    #[Title('Login | LinkMe')]
    public function render()
    {
        return view('livewire.auth.login');
    }

}
