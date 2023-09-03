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
                    {{-- <div wire:loading wire:target="image">
                        <div class="text-success">
                            Uploading image
                        </div>
                    </div> --}}
                    <div class="d-grid gap-2 mt-2">
                        <button class="btn btn-purple btn-pill" type="submit">
                            {{-- <div wire:loading.remove wire:target="updateImage, image">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 8h.01"></path>
                                    <path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4"></path>
                                    <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                    <path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596"></path>
                                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                </svg>
                            </div> --}}
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
