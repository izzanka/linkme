<?php

namespace App\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class Status extends Component
{
    public Link $link;
    public bool $is_active = false;

    public function mount()
    {
        $this->is_active = $this->link->is_active;
    }

    public function updating($name, $value)
    {
        $this->authorize('update', $this->link);

        try {

            $this->link->update([
                $name => $value
            ]);

            $this->dispatch('link-updated');

        } catch (\Throwable $th) {
            session()->flash('message', 'Error when updating link status, please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.status');
    }
}
