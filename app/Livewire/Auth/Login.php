<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->validate();

        try {

            if(Auth::attempt(['email' => $this->form->email, 'password' => $this->form->password], $this->form->remember)){
                return $this->redirect(route('links.index'), navigate: true);
            }

            session()->flash('message', 'Email or password is wrong.');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong.');
        }
    }

    #[Title('Sign in | LinkMe')]
    public function render()
    {
        return view('livewire.auth.login');
    }

}
