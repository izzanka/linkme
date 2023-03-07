<?php

namespace App\Http\Livewire\User\Link;

use App\Models\Link;
use Livewire\Component;

class LinkIndex extends Component
{
    public $links;

    protected $listeners = [
        'link-index-refresh' => '$refresh',
        'link-index-mount' => 'mount'
    ];

    public function mount()
    {
        $this->links = auth()->user()->links()->latest()->get();
    }

    protected $rules = [
        'links.*.title' => 'required|string|max:15',
        'links.*.url' => 'required|url|active_url|max:225',
    ];

    protected $messages = [
        'links.*.title.required' => 'The title field is required.',
        'links.*.title.string' => 'The title must be a string.',
        'links.*.title.max:15' => 'The title must not be greater than 15 characters.',

        'links.*.url.required' => 'The url field is required.',
        'links.*.url.url' => 'The url must be a valid URL.',
        'links.*.url.active_url' => 'The url is not a valid URL.',
        'links.*.url.max:225' => 'The url must not be greater than 225 characters.',
    ];

    public function updated()
    {
        $this->validate();

        try {

            foreach($this->links as $link){
                $link->update([
                    'title' => $link->title,
                    'url' => $link->url
                ]);
            }

            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function delete($linkId)
    {
        try {

            $link = Link::findOrFail($linkId);
            $link->delete();

            $this->emit('link-index-refresh');
            $this->emit('link-preview-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.link.link-index');
    }
}
