<?php

namespace App\Livewire\User\Link;

use Livewire\Attributes\On;
use Livewire\Component;

class Preview extends Component
{
    #[On('link-updated')]
    #[On('link-deleted')]
    #[On('appearance-updated')]
    public function render()
    {
        return view('livewire.user.link.preview', [
            'links' => auth()->user()->links()->select('id', 'title', 'url', 'is_icon')->where('is_active', true)->orderBy('updated_at')->get(),
        ]);
    }
}
