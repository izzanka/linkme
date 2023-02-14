<?php

namespace App\Http\Livewire\User\Profile;

use App\Http\Requests\User\Profile\UpdateProfileRequest;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileIndex extends Component
{
    use WithFileUploads;

    public $username, $credential, $image;

    public function rules()
    {
        return (new UpdateProfileRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        auth()->user()->update([
            'username' => $this->username,
            'credential' => $this->credential,
        ]);

        $this->emit('link-preview-render');
    }

    public function updateImage()
    {
        $this->validate([
            'image' => 'required|max:2048',
        ]);

        auth()->user()->media()->delete();

        auth()->user()->addMediaFromDisk('livewire-tmp/' . $this->image->getFileName())->toMediaCollection('user');

        $this->emit('link-preview-render');
    }

    public function render()
    {
        return view('livewire.user.profile.profile-index');
    }
}
