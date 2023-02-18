<?php

namespace App\Http\Livewire\User\Profile;

use App\Http\Requests\User\ProfileRequest;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileIndex extends Component
{
    use WithFileUploads;

    public $username, $bio, $image, $iteration;

    public function rules()
    {
        return (new ProfileRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        auth()->user()->update([
            'username' => $this->username,
            'bio' => $this->bio,
        ]);

        $this->emit('link-preview-refresh');
        $this->emit('profile-navbar-refresh');
    }

    public function updateProfileImage()
    {
        $this->validate([
            'image' => 'required|max:2048|image',
        ]);

        auth()->user()->media()->delete();

        auth()->user()->addMediaFromDisk('livewire-tmp/' . $this->image->getFileName())->toMediaCollection('user');

        $this->reset(['image']);
        $this->iteration++;

        $this->emit('link-preview-refresh');
        $this->emit('profile-navbar-refresh');
    }

    public function render()
    {
        return view('livewire.user.profile.profile-index');
    }
}
