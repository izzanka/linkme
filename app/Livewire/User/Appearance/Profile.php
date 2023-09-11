<?php

namespace App\Livewire\User\Appearance;

use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Profile extends Component
{
    public string $username = '';

    public $bio = null;

    public function rules()
    {
        return [
            'username' => ['required', 'max:19', 'string', Rule::unique('users')->ignore(auth()->id())],
            'bio' => ['string', 'max:40'],
        ];
    }

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->bio = auth()->user()->bio;
    }

    public function updatedUsername()
    {
        $this->validateOnly('username');

        try {

            auth()->user()->update([
                'username' => $this->username,
                'username_slug' => str()->slug($this->username),
            ]);

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            $this->dispatch('swal',
                title: 'Update username error',
                icon: 'error',
            );
        }
    }

    public function updatedBio()
    {
        $this->validateOnly('bio');

        try {

            auth()->user()->update([
                'bio' => $this->bio,
            ]);

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            $this->dispatch('swal',
                title: 'Update bio error',
                icon: 'error',
            );
        }
    }

    #[On('appearance-updated')]
    public function render()
    {
        return view('livewire.user.appearance.profile');
    }
}
