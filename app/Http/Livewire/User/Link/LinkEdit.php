<?php

namespace App\Http\Livewire\User\Link;

use App\Http\Requests\User\LinkRequest;
use App\Models\Link;
use Livewire\Component;

class LinkEdit extends Component
{
    public $linkId, $title, $url;

    protected $listeners = [
        'link-edit-refresh' => '$refresh',
    ];

    protected function rules()
    {
        return (new LinkRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        try {
            $this->validate();

            $link = Link::findOrFail($this->linkId);

            $link->update([
                'title' => $this->title,
                'url' => $this->url,
            ]);

            $this->reset(['title','url']);

            $this->emit('link-index-refresh');
            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-edit');
    }
}
