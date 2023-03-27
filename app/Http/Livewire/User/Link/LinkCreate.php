<?php

namespace App\Http\Livewire\User\Link;

use App\Http\Requests\User\LinkRequest;
use Livewire\Component;

class LinkCreate extends Component
{
    public string $url = '', $title = '';

    protected $listeners = [
        'link-create-refresh' => '$refresh',
    ];

    protected function rules()
    {
        return (new LinkRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        if(auth()->user()->links()->count() >= 5){

            $this->reset();
            session()->flash('message', 'Can only have 5 links');

        }else{

            $this->validate();

            try{
                auth()->user()->links()->create([
                    'title' => $this->title,
                    'url' => $this->url
                ]);

                $this->emit('link-index-mount');
                $this->emit('link-create-refresh');
                $this->reset();

            }catch(\Throwable $th){
                session()->flash('message', 'Something wrong! please try again later.');
            }
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-create');
    }
}
