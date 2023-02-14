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
        'background_color' => 'required|size:7|starts_with:#',
        'button_color' => 'required|size:7|starts_with:#',
        'button_font_color' => 'required|size:7|starts_with:#',
        'button_fill' => 'required|size:7|starts_with:#',
        'button_outline' => 'required|size:7|starts_with:#',
        'font_color' => 'required|size:7|starts_with:#',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        auth()->user()->appearance()->update([
            'background_color' => $this->background_color,
            'button_color' => $this->button_color,
            'button_font_color' => $this->button_font_color,
            'font_color' => $this->font_color,
        ]);

        $this->emit('link-preview-render');
    }

    public function updateButton($type, $rounded)
    {
        if($type == 'outline')
        {
            auth()->user()->appearance()->update([
                'button_fill' => false,
                'button_outline' => true,
                'button_rounded' => $rounded
            ]);

        }else if($type == 'fill')
        {
            auth()->user()->appearance()->update([
                'button_fill' => true,
                'button_outline' => false,
                'button_rounded' => $rounded
            ]);

        }

        $this->emit('link-preview-render');

    }


    public function render()
    {
        return view('livewire.user.appearance.appearance-index');
    }
}
