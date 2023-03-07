<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkStatus extends Component
{
    public $link;
    public bool $isActive;

    public function mount(Link $link)
    {
        $this->isActive = $link->isActive;
        $this->link = $link;
    }

    public function updating(string $field, bool $value)
    {
        $this->link->update([
            'isActive' => $value
        ]);

        $this->emit('link-preview-refresh');
    }

    public function render()
    {
        return view('livewire.user.link.link-status');
    }
}
