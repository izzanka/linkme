<?php

namespace App\Livewire\User\Appearance;

use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Rule(['required', 'size:7', 'starts_with:#'])]
    public string $background_color = '';

    #[Rule(['required', 'size:7', 'starts_with:#'])]
    public string $button_color = '';

    #[Rule(['required', 'size:7', 'starts_with:#'])]
    public string $button_font_color = '';

    #[Rule(['required', 'size:7', 'starts_with:#'])]
    public string $font_color = '';

    public bool $status = false;
    public $can_reset = false;

    #[On('appearance-reset')]
    public function mount()
    {
        $this->background_color = auth()->user()->appearance->background_color;
        $this->button_color = auth()->user()->appearance->button_color;
        $this->button_font_color = auth()->user()->appearance->button_font_color;
        $this->font_color = auth()->user()->appearance->font_color;
        $this->can_reset = auth()->user()->appearance->can_reset;

        if(auth()->user()->links()->where('is_active', true)->count() > 0)
        {
            $this->status = true;
        }
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);

        try {

            auth()->user()->appearance()->update([
                $name => $value,
            ]);

            if(!$this->can_reset)
            {
                auth()->user()->appearance()->update(['can_reset' => true]);
            }

            $this->dispatch('appearance-updated');
            $this->dispatch('appearance-reset');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Update appearance error',
                'icon' => 'error',
            ]);
        }
    }

    public function updateButton($type, $size)
    {
        $types = ['fill', 'outline', 'shadow'];
        $sizes = ['0', '4', 'pill', 'shadow-sm', 'shadow', 'shadow-lg'];

        if (! in_array($type, $types) || ! in_array($size, $sizes)) {
            $this->dispatch('swal', [
                'title' => 'Update button style error',
                'icon' => 'error',
            ]);
        }

        try {

            if ($type == 'fill' || $type == 'outline') {
                auth()->user()->appearance()->update([
                    'button_fill' => $type == 'fill' ? true : false,
                    'button_outline' => $type == 'outline' ? true : false,
                    'button_rounded' => $size,
                ]);
            } else {
                auth()->user()->appearance()->update([
                    'button_shadow' => $size,
                ]);
            }

            if(!$this->can_reset)
            {
                auth()->user()->appearance()->update(['can_reset' => true]);
            }

            $this->dispatch('appearance-updated');
            $this->dispatch('appearance-reset');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Update button style error',
                'icon' => 'error',
            ]);
        }
    }

    public function resetAppearance()
    {
        try {

            auth()->user()->appearance()->update([
                'button_color' => '#000000',
                'button_font_color' => '#000000',
                'button_fill' => false,
                'button_outline' => true,
                'button_rounded' => '0',
                'button_shadow' => 'shadow-none',
                'background_color' => '#FFFFFF',
                'font_color' => '#000000',
                'can_reset' => false,
            ]);

            $this->dispatch('appearance-updated');
            $this->dispatch('appearance-reset');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Reset appearance error',
                'icon' => 'error',
            ]);
        }
    }


    #[Title('Appearance | LinkMe')]
    public function render()
    {
        return view('livewire.user.appearance.index');
    }
}
