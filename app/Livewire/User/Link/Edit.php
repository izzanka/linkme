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

    #[Rule(['required', 'string', 'max:15'])]
    public $title;

    #[Rule(['required', 'url', 'active_url', 'max:255'])]
    public $url;

    public $link;

    public function mount(Link $link)
    {
        $this->id = $link->id;
        $this->title = $link->title;
        $this->url = $link->url;
        $this->link = $link;
    }

    public function updatedUrl($name, $value)
    {
        $this->validateOnly('url');

        try {

            $this->link->update([
                'url' => $this->url,
            ]);

            $this->dispatch('link-updated');
            $this->dispatch('link-created');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Update url error',
                'icon' => 'error',
            ]);
        }
    }

    public function updatedTitle()
    {
        $this->validateOnly('title');

        try {

            $this->link->update([
                'title' => $this->title,
            ]);

            if ($this->link->is_icon) {
                if (! file_exists(public_path('storage/images/icons/brand-'.lcfirst($this->title).'.svg'))) {
                    $this->link->update(['is_icon' => 0]);
                }
            }

            $this->dispatch('link-updated');
            $this->dispatch('link-created');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Update title error',
                'icon' => 'error',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.link.edit');
    }
}
