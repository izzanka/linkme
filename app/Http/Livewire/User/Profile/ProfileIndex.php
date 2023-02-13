<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class ProfileIndex extends Component
{
    public $username, $credential;

    public function render()
    {
        return view('livewire.user.profile.profile-index');
    }
}
