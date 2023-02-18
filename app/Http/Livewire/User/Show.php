<?php

namespace App\Http\Livewire\User;

use App\Models\Link;
use Livewire\Component;

class Show extends Component
{
    public $links = [];
    public $font_color, $button_rounded, $button_outline, $button_color, $button_font_color;
    public $username, $bio, $image;

    public function mount($user)
    {
        $this->font_color = $user->appearance->font_color;
        $this->button_rounded = $user->appearance->button_rounded;
        $this->button_outline = $user->appearance->button_outline;
        $this->button_color = $user->appearance->button_color;
        $this->button_font_color = $user->appearance->button_font_color;

        $this->username = $user->username;
        $this->bio = $user->bio;
        $this->image = $user->getFirstMediaUrl('users','thumb');

        $this->links = $user->links->toArray();

        $user->incrementViewsCount();
    }

    public function clicked(Link $link)
    {
        $link->incrementClicksCount();
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
