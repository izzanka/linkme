<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    public $registeredUsers;
    public $totalRegisteredUser;

    public function compact()
    {
        $this->registeredUsers = User::select('id','username','username_slug','bio')->latest()->take(10)->get();
        $this->totalRegisteredUser = User::count();
    }

    #[Title('Home | LinkMe')]
    public function render()
    {
        return view('livewire.home');
    }
}
