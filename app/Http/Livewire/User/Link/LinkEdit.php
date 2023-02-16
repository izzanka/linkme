<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkEdit extends Component
{
    public $linkId, $title, $url;

    protected $listeners = [
        'link-edit-refresh' => '$refresh',
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

            $this->emit('link-index-refresh');
            $this->emit('link-preview-refresh');
            $this->emit('link-create-updateTotalLinks');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-edit');
    }
}
