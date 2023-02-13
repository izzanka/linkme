<?php

namespace App\Http\Livewire\User\Appearance;

use App\Models\Appearance;
use Livewire\Component;

class AppearanceIndex extends Component
{
    public $background_color, $button_color, $button_font_color, $button_fill, $button_outline, $font_color;

    public function mount($appearance)
    {
        $this->background_color = $appearance->background_color;
        $this->button_color = $appearance->button_color;
        $this->button_font_color = $appearance->button_font_color;
        $this->button_fill = $appearance->button_fill;
        $this->button_outline = $appearance->button_outline;
        $this->font_color = $appearance->font_color;
    }

    protected $rules = [
        'background_color' => '',
        'button_color' => '',
        'button_font_color' => '',
        'button_fill' => '',
        'button_outline' => '',
        'font_color' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        auth()->user()->appearance()->update([
            'background_color' => $this->background_color,
            'button_color' => $this->button_color,
            'button_font_color' => $this->button_font_color,
            'button_fill' => $this->button_fill,
            'button_outline' => $this->button_outline,
            'font_color' => $this->font_color,
        ]);

        $this->emit('link-preview-render');

    }


    public function render()
    {
        return view('livewire.user.appearance.appearance-index');
    }
}
