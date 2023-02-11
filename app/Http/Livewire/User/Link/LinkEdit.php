<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkEdit extends Component
{
    public $linkId;
    public $title;
    public $url;

    protected $listeners = [
        'link-edit' => 'edit'
    ];

    protected $rules = [
        'title' => 'required|string|max:25',
        'url' => 'required|url'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($linkId, $title, $url)
    {
        $this->linkId = $linkId;
        $this->title = $title;
        $this->url = $url;
    }

    public function update()
    {
        try {
            $link = Link::find($this->linkId);

            $this->validate();

            $link->update([
                'title' => $this->title,
                'url' => $this->url
            ]);

            $this->reset(['title','url']);
            $this->emit('link-index-render');
            $this->emit('link-preview-render');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-edit');
    }
}
