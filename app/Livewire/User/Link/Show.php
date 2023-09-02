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
    public function mount()
    {
        $this->links = auth()->user()->links()->latest()->get();
    }

    public function addIconLogo(Link $link)
    {
        try {

            $this->authorize('update', $link);

            if($link->is_icon){
                $link->update(['is_icon' => 0]);
            }else{
                if(file_exists(public_path('storage/images/icons/brand-' . lcfirst($link->title) . '.svg'))){
                    $link->update(['is_icon' => 1]);
                }
            }

            $this->dispatch('link-updated');
            $this->dispatch('link-created');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.' . $th->getMessage());
        }
    }

    public function delete(Link $link)
    {
        try {

            $this->authorize('update', $link);

            $link->delete();
            $this->reset();
            $this->dispatch('link-deleted');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.show');
    }
}
