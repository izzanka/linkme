<?php

namespace App\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class Status extends Component
{
    public Link $link;
    public $is_active;

    public function mount()
    {
        $this->is_active = $this->link->is_active;
    }

    public function updating($name, $value)
    {
        try {

            $this->authorize('update', $this->link);

            $this->link->update([
                'is_active' => $value
            ]);

            $this->dispatch('link-updated');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.status');
    }
}
