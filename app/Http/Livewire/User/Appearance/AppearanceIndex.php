<?php

namespace App\Http\Livewire\User\Appearance;

use App\Http\Requests\User\AppearanceRequest;
use Livewire\Component;

class AppearanceIndex extends Component
{
    public string $background_color = '', $button_color = '', $button_font_color = '', $font_color = '';

    public function mount()
    {
        $this->background_color = auth()->user()->appearance->background_color;
        $this->button_color = auth()->user()->appearance->button_color;
        $this->button_font_color = auth()->user()->appearance->button_font_color;
        $this->font_color = auth()->user()->appearance->font_color;
    }

    protected function rules()
    {
        return (new AppearanceRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        try {

            auth()->user()->appearance()->update([
                'background_color' => $this->background_color,
                'button_color' => $this->button_color,
                'button_font_color' => $this->button_font_color,
                'font_color' => $this->font_color,
            ]);

            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function updateButton(string $button_type, string $button_rounded_size)
    {
        $button_types = ['fill','outline'];
        $button_rounded_sizes = ['0','4','pill'];

        if(!in_array($button_type, $button_types) || !in_array($button_rounded_size, $button_rounded_sizes))
        {
            session()->flash('message', 'Something wrong! please try again later.');
        }

        try {

            auth()->user()->appearance()->update([
                'button_fill' => $button_type == "fill" ? true : false,
                'button_outline' => $button_type == "outline" ? true : false,
                'button_rounded' => $button_rounded_size,
            ]);

            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.appearance.appearance-index');
    }
}
