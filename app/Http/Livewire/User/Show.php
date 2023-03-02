<?php

namespace App\Http\Livewire\User;

use App\Models\Link;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public array $links = [];
    public string $font_color = '', $background_color = '', $button_rounded = '', $button_outline = '', $button_color = '', $button_font_color = '',
                  $username = '', $bio = '', $image = '';

    public function mount($username_slug)
    {
        $user = User::with(['links' => fn($query) => $query->where('active', true),'appearance'])->where('username_slug', $username_slug)->first();

        if(!$user){
            abort(404);
        }

        $this->font_color = $user->appearance->font_color;
        $this->background_color = $user->appearance->background_color;
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
