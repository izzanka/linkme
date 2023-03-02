<?php

namespace App\Http\Livewire\User\Link;

use Livewire\Component;

class LinkNavbar extends Component
{
    protected $listeners = [
        'link-navbar-refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.user.link.link-navbar');
    }
}
