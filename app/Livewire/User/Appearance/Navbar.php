<?php

namespace App\Livewire\User\Appearance;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    #[On('appearance-updated')]
    public function render()
    {
        return view('livewire.user.appearance.navbar');
    }
}
