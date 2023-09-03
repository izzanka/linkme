<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->validate();

        try {

            DB::transaction(function()
            {
                $user = User::create([
                    'username' => ucfirst($this->form->username),
                    'username_slug' => str()->slug($this->form->username),
                    'email' => $this->form->email,
                    'password' => bcrypt($this->form->password),
                    'image' => 'https://ui-avatars.com/api/?name=' . $this->form->username . '&background=random&rounded=true&size=112'
                ]);

                $user->appearance()->create();

                Auth::login($user);

                return $this->redirect(route('links.index'), navigate: true);
            });

        } catch (\Throwable $th) {
            session()->flash('message', 'Register error, please try again later.');
        }
    }

    #[Title('Sign up | LinkMe')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
