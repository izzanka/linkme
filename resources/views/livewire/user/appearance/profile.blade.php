<div>
    <h2>
        <b>Profile</b>
        <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading wire:target="updateImage, image, username, bio"></div>
    </h2>
    <div class="card rounded-4 mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-3 mt-2">
                <img loading="lazy" @if(auth()->user()->image == null) src="https://ui-avatars.com/api/?name={{ auth()->user()->username }}&background=206BC4&color=fff&rounded=true&size=112" @else src="{{ asset(auth()->user()->image) }}" @endif class="avatar avatar-lg rounded-circle" alt="image-profile">
            </div>
            <div class="col-9 mt-2 mb-2">
                <form wire:submit="updateImage">
                    <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" wire:model="image" id={{ $image_iteration }}>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="d-grid gap-2 mt-2">
                        <button class="btn btn-purple btn-pill" type="submit">
                            <div wire:loading.delay.longest wire:target="updateImage, image">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                            </div>
                            <strong>Update profile image</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <input type="text" class="form-control rounded-3 @error('username') is-invalid @enderror" placeholder="Username"  wire:model.live="username">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mt-2 mb-2">
            <div class="col-12">
                <textarea class="form-control rounded-3 @error('bio') is-invalid @enderror" placeholder="Bio" wire:model.live="bio"></textarea>
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
