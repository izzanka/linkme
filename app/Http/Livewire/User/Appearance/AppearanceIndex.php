<?php

namespace App\Http\Livewire\User\Appearance;

use App\Http\Requests\User\Appearance\UpdateRequest;
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

    protected function rules()
    {
        return (new UpdateRequest)->rules();
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

    public function updateButton($type, $rounded)
    {
        if($type != "outline" || $type != "fill")
        {
            session()->flash('message', 'Something wrong! please try again later.');
        }

        try {

            auth()->user()->appearance()->update([
                'button_fill' => $type == "fill" ? true : false,
                'button_outline' => $type == "fill" ? false : true,
                'button_rounded' => $rounded
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
