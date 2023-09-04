<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{
    #[Rule(['required','string','max:19','unique:users,username'])]
    public $username = '';

    #[Rule(['required','email','max:255','unique:users,email'])]
    public $email = '';

    #[Rule(['required', 'min:8', 'max:255'])]
    public $password = '';

    public function register()
    {
        $this->validate();

        try {

            DB::transaction(function()
            {
                $user = User::create([
                    'username' => ucfirst($this->username),
                    'username_slug' => str()->slug($this->username),
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'image' => 'https://ui-avatars.com/api/?name=' . $this->username . '&background=random&rounded=true&size=112'
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
