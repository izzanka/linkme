<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.user.search', [
            'users' => User::select('id','username','username_slug','bio')->where('username', 'like', '%'.$this->search.'%')->latest()->get(),
        ]);
    }
}
