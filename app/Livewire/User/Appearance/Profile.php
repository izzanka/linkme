<?php

namespace App\Livewire\User\Appearance;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    #[Rule(['required','image','max:2048'])]
    public $image = null;
    public int $image_iteration = 0;

    #[Rule(['required','max:19','string'])]
    public string $username = '';

    #[Rule(['string','max:40'])]
    public $bio;

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->bio = auth()->user()->bio;
    }

    public function updated($name, $value)
    {
        try {

            auth()->user()->update([
                $name => $value,
            ]);

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            session()->flash('message', 'Error when updating profile, please try again later.');
        }
    }

    public function updateImage()
    {
        $this->validate();

        try {

            $temp_image = $this->image->store('public/images/photos');

            $image = str_replace('public','storage', $temp_image);

            auth()->user()->update([
                'image' => $image
            ]);

            $this->reset('image');
            $this->image_iteration++;

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            return $this->redirect(route('appearances.index'), navigate: true)->with('Erro when updating profile image, please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.appearance.profile');
    }
}
