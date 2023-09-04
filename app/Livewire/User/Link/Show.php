<?php

namespace App\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;
use Livewire\Attributes\On;

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
        $this->authorize('update', $link);

        try {

            if($link->is_icon){
                $link->update(['is_icon' => 0]);
            }else{
                if(file_exists(public_path('storage/images/icons/brand-' . lcfirst($link->title) . '.svg'))){
                    $link->update(['is_icon' => 1]);
                }
            }

            $this->dispatch('link-created');
            $this->dispatch('link-updated');

        } catch (\Throwable $th) {
            return $this->redirect(route('links.index'), navigate: true)->with('message', 'Error when adding icon logo to link, please try again later.');
        }
    }

    public function delete(Link $link)
    {
        $this->authorize('update', $link);

        try {

            $link->delete();
            $this->reset();
            $this->dispatch('link-deleted');

        } catch (\Throwable $th) {
            return $this->redirect(route('links.index'), navigate: true)->with('message', 'Error when deleting link, please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.show');
    }
}
