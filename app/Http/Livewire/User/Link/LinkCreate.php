<?php

namespace App\Http\Livewire\User\Link;

use Livewire\Component;

class LinkCreate extends Component
{
    public $url, $title, $disabled = true, $totalLinks;

    protected $rules = [
        'title' => 'required|string|max:25',
        'url' => 'required|url'
    ];

    public function mount()
    {
        $this->totalLinks = auth()->user()->links()->count();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->disabled = false;
    }

    public function store()
    {
        if(auth()->user()->links()->count() >= 5){
            session()->flash('error-msg', 'Can only have 5 links');
        }else{
            $this->validate();

            try{

                auth()->user()->links()->create([
                    'title' => $this->title,
                    'url' => $this->url
                ]);

                $this->reset(['url','title']);

                $this->emit('link-index-render');
                $this->emit('link-create-render');

            }catch(\Throwable $th){

            }
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-create');
    }
}
