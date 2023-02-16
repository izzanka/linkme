<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkIndex extends Component
{
    public $status, $title, $url;
    public $editTitle, $editUrl, $editLink = false;

    protected $listeners = [
        'link-index-refresh' => '$refresh'
    ];

    public function resetEdit()
    {
        $this->reset(['editTitle','editUrl']);
    }

    public function edit($linkId)
    {
        try {
            $link = Link::find($linkId);
            $this->editTitle = $link->title;
            $this->editUrl = $link->url;
            $this->editLink = true;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function delete($linkId)
    {
        try {
            $link = Link::find($linkId);
            $link->delete();

            $this->emit('link-preview-refresh');
            $this->emit('link-create-refresh');
            $this->emit('link-create-updateTotalLinks');

        } catch (\Throwable $th) {

        }
    }

    public function updateStatus($status, $linkId)
    {
        if($status == false){
            $this->status = true;
        }else{
            $this->status = false;
        }

        try {

            $link = Link::find($linkId);

            $link->update([
                'active' => $this->status,
            ]);

            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.user.link.link-index',[
            'links' => auth()->user()->links()->latest()->get(),
        ]);
    }
}
