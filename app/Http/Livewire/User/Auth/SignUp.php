<?php

namespace App\Http\Livewire\User\Auth;

use App\Http\Requests\User\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignUp extends Component
{
    use WithFileUploads;

    public $username, $email, $password, $image, $credential;

    public function rules()
    {
        return (new SignUpRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'username_slug' => Str::slug($this->username),
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user);

        session()->flash('message', 'Your account has been saved!, Welcome ' . $this->email);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.user.auth.sign-up')->extends('layouts.app');
    }
}
