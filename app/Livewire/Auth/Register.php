<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $registerForm;

    public function register()
    {
        $this->validate();

        try {

            DB::transaction(function()
            {
                $user = User::create([
                    'username' => $this->registerForm->username,
                    'username_slug' => Str::slug($this->registerForm->username),
                    'email' => $this->registerForm->email,
                    'password' => bcrypt($this->registerForm->password),
                    'image' => 'https://ui-avatars.com/api/?name=' . $this->registerForm->username . '&background=random&rounded=true&size=112'
                ]);

                $user->appearance()->create();

                Auth::login($user);

                return redirect()->route('links.index');
            });

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong.');
        }
    }

    #[Title('Sign up | LinkMe')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
