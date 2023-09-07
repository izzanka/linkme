<?php

namespace App\Livewire\User\Appearance;

use Illuminate\Support\Facades\File;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    #[Rule(['required', 'image', 'max:2048'])]
    public $image = null;

    public int $image_iteration = 0;

    public function removeImage()
    {
        if (auth()->user()->image != null) {
            try {

                File::delete(auth()->user()->image);

                auth()->user()->update([
                    'image' => null,
                ]);

                $this->dispatch('appearance-updated');

            } catch (\Throwable $th) {
                $this->dispatch('swal', [
                    'title' => 'Remove profile image error',
                    'icon' => 'error',
                ]);
            }
        }
    }

    public function updateImage()
    {
        $this->validate();

        try {

            $temp_image = $this->image->store('public/images/photos');

            $image = str_replace('public', 'storage', $temp_image);

            auth()->user()->update([
                'image' => $image,
            ]);

            $this->image_iteration++;

            $this->dispatch('appearance-updated');

        } catch (\Throwable $th) {
            $this->dispatch('swal', [
                'title' => 'Update profile image error',
                'icon' => 'error',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.appearance.image');
    }
}
