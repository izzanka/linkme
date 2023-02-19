<?php

namespace App\Http\Livewire\User\Auth;

use App\Http\Requests\User\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class SignUp extends Component
{
    use WithFileUploads;

    public $username, $email, $password, $image, $bio;

    protected function rules()
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

        try {

            DB::transaction(function()
            {
                $user = User::create([
                    'username' => $this->username,
                    'username_slug' => Str::slug($this->username),
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'bio' => $this->bio,
                ]);

                if($this->image == null){
                    $url = 'https://ui-avatars.com/api/?name=' . $this->username . '&background=random&rounded=true&size=112';
                    $user->addMediaFromUrl($url)->toMediaCollection('users');
                }else{
                    $user->addMediaFromDisk('livewire-tmp/' . $this->image->getFileName())->toMediaCollection('users');
                }

                $user->appearance()->create();

                Auth::login($user);

                return redirect()->route('links.index');
            });

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.auth.sign-up')->extends('layouts.app');
    }
}
