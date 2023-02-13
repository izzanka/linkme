<?php

namespace App\Http\Livewire\User\Link;

use Livewire\Component;

class LinkPreview extends Component
{
    public $appearance;

    protected $listeners = [
        'link-preview-render' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.user.link.link-preview',[
            'links' => auth()->user()->links()->where('active', true)->orderBy('updated_at')->get(),
        ]);
    }
}
