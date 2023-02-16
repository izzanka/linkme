<?php

namespace App\Http\Livewire\User\Auth;

use App\Http\Requests\User\Auth\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SignIn extends Component
{
    public $email, $password, $remember_me = false;

    protected function rules()
    {
        return (new SignInRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me))
        {
            return redirect()->route('links.index');
        }

        session()->flash('message', 'Username or password is wrong!');
    }

    public function render()
    {
        return view('livewire.user.auth.sign-in')->extends('layouts.app');
    }
}
