<?php

namespace App\Livewire\User\Link;

use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    #[On('appearance-updated')]
    public function render()
    {
        return view('livewire.user.link.navbar');
    }
}
