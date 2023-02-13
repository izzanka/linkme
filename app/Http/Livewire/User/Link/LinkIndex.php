<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkIndex extends Component
{
    public $status, $title, $url;

    protected $listeners = [
        'link-index-render' => '$refresh'
    ];

    public function mount()
    {


    }

    public function delete($linkId)
    {
        try {
            $link = Link::find($linkId);
            $link->delete();

            $this->emit('link-preview-render');
            $this->emit('link-create-render');

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

            $this->emit('link-preview-render');

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
