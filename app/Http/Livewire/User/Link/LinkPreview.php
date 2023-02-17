<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Appearance;
use Livewire\Component;

class LinkPreview extends Component
{
    // public $background_color, $font_color, $button_rounded, $button_font_color, $button_outline, $button_color;
    public $appearance;

    protected $listeners = [
        'link-preview-refresh' => '$refresh'
    ];

    // public function mount($appearance)
    // {
    //     $this->appearance = $appearance->toArray();
    //     // $this->background_color = $appearance->background_color;
    //     // $this->font_color = $appearance->font_color;
    //     // $this->button_rounded = $appearance->button_rounded;
    //     // $this->button_font_color = $appearance->button_font_color;
    //     // $this->button_outline = $appearance->button_outline;
    //     // $this->button_color = $appearance->button_color;
    // }

    public function render()
    {
        return view('livewire.user.link.link-preview',[
            'links' => auth()->user()->links()->select('id','title','url')->where('active', true)->orderBy('created_at')->get(),
        ]);
    }
}
