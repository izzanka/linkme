<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Appearance;
use Livewire\Component;

class LinkPreview extends Component
{
    public $appearance;

    protected $listeners = [
        'link-preview-refresh' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.user.link.link-preview',[
            'links' => auth()->user()->links()->select('id','title','url')->where('active', true)->orderBy('created_at')->get(),
        ]);
    }
}
