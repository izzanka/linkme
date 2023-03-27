<?php

namespace App\Http\Livewire\User\Link;

use Livewire\Component;

class LinkPreview extends Component
{
    protected $listeners = [
        'link-preview-refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.user.link.link-preview',[
            'links' => auth()->user()->links()->select('id','title','url')->where('isActive', true)->orderBy('updated_at')->get(),
        ]);
    }
}
