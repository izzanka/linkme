<?php

namespace App\Http\Livewire\User\Profile;

use App\Http\Requests\User\ProfileRequest;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Image\Image;

class ProfileIndex extends Component
{
    use WithFileUploads;

    public string $username = '', $bio = '';
    public $image = null;
    public int $iteration = 0;

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->bio = auth()->user()->bio;
    }

    public function rules()
    {
        return (new ProfileRequest)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        try {

            auth()->user()->update([
                'username' => $this->username,
                'username_slug' => Str::slug($this->username),
                'bio' => $this->bio,
            ]);

            $this->emit('link-preview-refresh');
            $this->emit('link-navbar-refresh');
            $this->emit('profile-navbar-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function updateProfileImage()
    {
        $this->validate([
            'image' => 'required|max:2048|image',
        ]);

        try {

            auth()->user()->clearMediaCollection('users');

            auth()->user()->addMediaFromDisk('livewire-tmp/' . $this->image->getFileName())->toMediaCollection('users');

            $this->reset(['image']);
            $this->iteration++;

            $this->emit('link-preview-refresh');
            $this->emit('profile-navbar-refresh');

        } catch (\Throwable $th) {
            session()->flash('message', 'Something wrong! please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.user.profile.profile-index');
    }
}
