<?php

namespace App\Http\Livewire\User;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public array $links = [];
    public string $font_color = '', $background_color = '', $button_rounded = '', $button_outline = '', $button_color = '', $button_font_color = '', $username = '', $bio = '';
    public $image = null;

    public function mount(User $user)
    {
        $user->load(['links' => fn($query) => $query->where('isActive', true),'appearance']);

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

        if(Auth::check()){
            if(auth()->id() != $user->id){
                $user->incrementViewsCount();
            }
        }else{
            $user->incrementViewsCount();
        }
    }

    public function clicked(Link $link)
    {
        if(Auth::check()){
            if(auth()->id() != $link->user_id){
                $link->incrementClicksCount();
            }
        }else{
            $link->incrementClicksCount();
        }
    }

    public function render()
    {
        return view('livewire.user.show');
    }
}
