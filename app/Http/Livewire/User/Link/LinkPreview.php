<?php

namespace App\Http\Livewire\User\Link;

use Livewire\Component;

class LinkPreview extends Component
{
    protected $listeners = [
        'link-preview-render' => 'render'
    ];

    public function render()
    {
        return view('livewire.user.link.link-preview',[
            'links' => auth()->user()->links()->where('active', true)->orderBy('updated_at')->get(),
        ]);
    }
}
