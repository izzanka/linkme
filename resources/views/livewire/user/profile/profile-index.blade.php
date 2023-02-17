<div>
    <h2><b>Profile</b>
        <div wire:loading wire:target="username, bio">
            <span class="spinner-border spinner-border-sm ml-2" role="status"></span>
        </div>
    </h2>

    <div class="card rounded-4 mt-2">
        <div class="card-body">
            <form wire:submit.prevent="updateImage">
                <div class="row">
                    <div class="col-3 mt-2">
                        <span class="border border-secondary avatar avatar-xl rounded-circle" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
                    </div>
                    <div class="col-9 mt-2">
                        <div wire:loading wire:target="image">
                            <div class="mb-3">
                                <div class="spinner-border spinner-border-sm" role="status"></div>
                                Uploading image...
                            </div>
                        </div>
                        <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" wire:model.lazy="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-purple rounded-4" type="submit">Update profile image</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row mt-4 mb-3">
                <div class="row">
                    <input type="text" class="form-control rounded-3 @error('username') is-invalid @enderror" placeholder="Username"  wire:model.lazy="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <input type="text" class="form-control rounded-3 @error('bio') is-invalid @enderror" placeholder="Bio" wire:model.lazy="bio">
                    @error('bio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

</div>
