<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Home extends Component
{
    public $registeredUsers;
    public int $totalRegisteredUser = 0;

    #[Url]
    public $search = '';
    protected $queryString = [
        'search',
    ];

    public function mount()
    {
        $this->registeredUsers = User::select('id','username','username_slug','bio','image')->latest()->take(10)->get();
        $this->totalRegisteredUser = User::count();
    }

    #[Title('Home | LinkMe')]
    public function render()
    {
        return view('livewire.home', [
            'users' => User::select('id','username','username_slug','bio','image')->where('username', 'like', '%'.$this->search.'%')->latest()->get(),
        ]);
    }
}
