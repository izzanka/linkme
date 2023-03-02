<?php

namespace App\Http\Livewire\User\Link;

use App\Http\Requests\User\LinkRequest;
use App\Models\Link;
use Livewire\Component;

class LinkIndex extends Component
{
    public int $linkId = 0;
    public string $title = '', $url = '';
    public bool $status = false, $editLink = false;

    protected $listeners = [
        'link-index-refresh' => '$refresh'
    ];

    protected function rules()
    {
        return (new LinkRequest)->rules();
    }

    public function resetEdit()
    {
        $this->reset(['title','url']);
    }

    public function edit($linkId)
    {
        try {

            $link = Link::findOrFail($linkId);
            $this->linkId = $link->id;
            $this->title = $link->title;
            $this->url = $link->url;
            $this->editLink = true;

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function delete($linkId)
    {
        try {

            $link = Link::findOrFail($linkId);
            $link->delete();

            $this->emit('link-preview-refresh');
            $this->emit('link-create-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function updateStatus($status, $linkId)
    {
        $status == false ? $this->status = true : $this->status = false;

        try {

            $link = Link::findOrFail($linkId);

            $link->update([
                'active' => $this->status,
            ]);

            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function update()
    {
        $this->validate();

        try {

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
        return view('livewire.user.link.link-index',[
            'links' => auth()->user()->links()->latest()->get(),
        ]);
    }
}
