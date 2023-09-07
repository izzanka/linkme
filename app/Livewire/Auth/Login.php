<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule(['required','email','max:255'])]
    public $email = '';

    #[Rule(['required','max:255','min:8'])]
    public $password = '';

    #[Rule(['boolean'])]
    public $remember = false;

    public function login()
    {
        $this->validate();

        try {

            if(Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)){
                $this->redirect(route('links.index'));
            }else{
                session()->flash('message', 'Email or password is wrong.');
            }

        } catch (\Throwable $th) {
            session()->flash('message', 'Login error, please try again later.');
        }
    }

    #[Title('Sign in | LinkMe')]
    public function render()
    {
        return view('livewire.auth.login');
    }

}
