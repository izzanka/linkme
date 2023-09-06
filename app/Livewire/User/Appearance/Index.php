<?php

namespace App\Livewire\User\Appearance;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Rule(['required','size:7','starts_with:#'])]
    public string $background_color = '';

    #[Rule(['required','size:7','starts_with:#'])]
    public string $button_color = '';

    #[Rule(['required','size:7','starts_with:#'])]
    public string $button_font_color = '';

    #[Rule(['required','size:7','starts_with:#'])]
    public string $font_color = '';

    public function mount()
    {
        $this->background_color = auth()->user()->appearance->background_color;
        $this->button_color = auth()->user()->appearance->button_color;
        $this->button_font_color = auth()->user()->appearance->button_font_color;
        $this->font_color = auth()->user()->appearance->font_color;
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);

        try {

            auth()->user()->appearance()->update([
                $name => $value,
            ]);

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            session()->flash('message', 'Error when updating appearance, please try again later.');
        }
    }

    public function updateButton($type, $size)
    {
        $types = ['fill','outline','shadow'];
        $sizes = ['0','4','pill','shadow-sm','shadow','shadow-lg'];

        if(!in_array($type, $types) || !in_array($size, $sizes))
        {
            session()->flash('message', 'Something wrong! please try again later.');
        }

        try {

            if($type == 'fill' || $type == 'outline')
            {
                auth()->user()->appearance()->update([
                    'button_fill' => $type == "fill" ? true : false,
                    'button_outline' => $type == "outline" ? true : false,
                ]);

                auth()->user()->appearance()->update([
                    'button_rounded' => $size,
                ]);

            }else{
                auth()->user()->appearance()->update([
                    'button_shadow' => $size,
                ]);
            }

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            session()->flash('message', 'Error when updating appearance, please try again later.');
        }
    }

    #[Title('Appearance | LinkMe')]
    public function render()
    {
        return view('livewire.user.appearance.index');
    }
}
