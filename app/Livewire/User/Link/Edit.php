<?php

namespace App\Livewire\User\Link;

use App\Models\Link;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Edit extends Component
{
    #[Locked]
    public $id;

    #[Rule(['required','string','max:15'])]
    public $title;

    #[Rule(['required','url','active_url','max:255'])]
    public $url;

    public $link;

    public function mount(Link $link)
    {
        $this->id = $link->id;
        $this->title = $link->title;
        $this->url = $link->url;

        $this->link = $link;
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);

        try {

            $this->title = ucfirst($this->title);

            $this->link->update([
                $name => $value
            ]);

            if($name == 'title')
            {
                if($this->link->is_icon){
                    if(!file_exists(public_path('storage/images/icons/brand-' . lcfirst($this->title) . '.svg'))){
                        $this->link->update(['is_icon' => 0]);
                    }
                }
            }

            $this->dispatch('link-updated');
            $this->dispatch('link-created');

        } catch (\Throwable $th) {
            session()->flash('message', 'Error when updating link, please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.edit');
    }
}
