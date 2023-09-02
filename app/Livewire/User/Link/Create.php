<?php

namespace App\Livewire\User\Link;

use App\Livewire\Forms\LinkForm;
use Livewire\Component;
use Livewire\Attributes\On;

class Create extends Component
{
    public LinkForm $form;
    public $total_links;

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
            $this->form->reset();
            session()->flash('message', 'Can only have 5 links.');
        }

        $this->validate();

        try {

            auth()->user()->links()->create([
                'title' => ucfirst($this->form->title),
                'url' => $this->form->url
            ]);

            $this->dispatch('link-created');
            $this->form->reset();

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.create');
    }
}
