<?php

namespace App\Livewire\User\Link;

use Livewire\Component;
use Livewire\Attributes\Title;

class Index extends Component
{
    public int $ctr = 0;
    public int $total_views = 0;
    public int $total_clicks = 0;

    public function mount()
    {
        $this->total_views = auth()->user()->total_views;
        $this->total_clicks = auth()->user()->links()->sum('total_clicks');

        if($this->total_clicks != 0)
        {
            $rates = $this->total_clicks / $this->total_views;
            $this->ctr = $rates * 100;
        }
    }

    #[Title('Links | LinkMe')]
    public function render()
    {
        return view('livewire.user.link.index');
    }
}
