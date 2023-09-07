<?php

namespace App\Livewire\User\Link;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class Create extends Component
{
    #[Rule(['required','string','max:15'])]
    public string $title = '';

    #[Rule(['required','url','active_url','max:255'])]
    public string $url = '';

    public int $total_links = 0;

    #[On('link-created')]
    #[On('link-deleted')]
    public function mount()
    {
        $this->total_links = auth()->user()->links()->count();
    }

    public function store()
    {
        if($this->total_links >= 5)
        {
            $this->reset(['title','url']);
            session()->flash('message', 'Can only have 5 links.');
        }

        $this->validate();

        try {

            auth()->user()->links()->create([
                'title' => $this->title,
                'url' => $this->url
            ]);

            $this->reset(['title','url']);
            $this->dispatch('link-created');

        } catch (\Throwable $th) {
            return $this->redirect(route('links.index'), navigate: true)->with('message', 'Error when creating link, please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.create');
    }
}
