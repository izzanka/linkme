<div>
    <h2>
        <b>Profile</b>
        <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading wire:target="updateImage, image, username, bio"></div>
    </h2>
    <div class="card rounded-4 mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-3 mt-2">
                <span class="avatar avatar-xl rounded-circle mt-2" style="background-image: url(@if(auth()->user()->image == null) 'https://ui-avatars.com/api/?name={{ auth()->user()->username }}&background=206BC4&color=fff&rounded=true&size=112' @else {{ asset(auth()->user()->image) }} @endif)"></span>
            </div>
            <div class="col-9 mt-2 mb-2">
                <livewire:user.appearance.image/>
            </div>
        </div>
        <div class="row mt-3">
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
