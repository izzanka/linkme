<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class ProfileNavbar extends Component
{
    protected $listeners = [
        'profile-navbar-refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.user.profile.profile-navbar');
    }
}
