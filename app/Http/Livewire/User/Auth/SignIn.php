<?php

namespace App\Http\Livewire\User\Auth;

use App\Http\Requests\User\Auth\SignInRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SignIn extends Component
{
    public $email, $password, $remember = false;

    public function rules()
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

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember))
        {
            return redirect()->route('home');
        }

        session()->flash('message', 'Username or password is wrong!');

        return redirect()->route('sign-in');
    }

    public function render()
    {
        return view('livewire.user.auth.sign-in')->extends('layouts.app');
    }
}
