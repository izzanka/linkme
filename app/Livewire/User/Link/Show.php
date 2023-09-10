<?php

namespace App\Livewire\User\Link;

use App\Models\Link;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $links;

    #[On('link-created')]
    #[On('link-deleted')]
    #[On('link-updated')]
    public function mount()
    {
        $this->links = auth()->user()->links()->latest()->get();
    }

    public function addIconLogo(Link $link)
    {
        if ($link->user_id != auth()->id()) {
            $this->redirect(route('links.index'));
        }

        try {

            if ($link->is_icon) {
                $link->update(['is_icon' => 0]);
            } else {
                if (file_exists(public_path('storage/images/icons/brand-'.lcfirst($link->title).'.svg'))) {
                    $link->update(['is_icon' => 1]);
                }
            }

            $this->dispatch('link-created');
            $this->dispatch('link-updated');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Add icon logo error',
                'icon' => 'error',
            ]);
        }
    }

    public function delete(Link $link)
    {
        if ($link->user_id != auth()->id()) {
            $this->redirect(route('links.index'));
        }

        try {

            $link->delete();
            $this->reset();
            $this->dispatch('link-deleted');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Delete link error',
                'icon' => 'error',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.link.show');
    }
}
