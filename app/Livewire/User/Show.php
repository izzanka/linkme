<?php

namespace App\Livewire\User;

use App\Models\Link;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $links;

    public string $font_color = '';

    public string $background_color = '';

    public string $button_rounded = '';

    public string $button_outline = '';

    public string $button_color = '';

    public string $button_font_color = '';

    public string $button_shadow = '';

    public string $username = '';

    public $bio;

    public $image;

    public function mount(User $user)
    {
        $user->load(['links' => fn ($query) => $query->where('is_active', true), 'appearance']);

        $this->font_color = $user->appearance->font_color;
        $this->background_color = $user->appearance->background_color;
        $this->button_rounded = $user->appearance->button_rounded;
        $this->button_outline = $user->appearance->button_outline;
        $this->button_color = $user->appearance->button_color;
        $this->button_font_color = $user->appearance->button_font_color;
        $this->button_shadow = $user->appearance->button_shadow;

        $this->username = $user->username;
        $this->bio = $user->bio;
        $this->image = $user->image;

        $this->links = $user->links()->get();

        if (auth()->check()) {
            if (auth()->id() != $user->id) {
                $user->increment('total_views');
            }
        } else {
            $user->increment('total_views');
        }

    }

    public function click(Link $link)
    {
        if (auth()->check()) {
            if (auth()->id() != $link->user_id) {
                $link->increment('total_clicks');
            }
        } else {
            $link->increment('total_clicks');
        }
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
