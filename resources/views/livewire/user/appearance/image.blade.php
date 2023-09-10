<div>
    <form wire:submit="updateImage">
        <input type="file" class="form-control rounded-3 @error('image') is-invalid @enderror" wire:model="image" id={{ $image_iteration }}>
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="d-grid gap-2">
            <button class="btn btn-purple rounded-3 mt-3" type="submit">
                <div wire:loading.delay.longest.remove wire:target="image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8h.01"></path>
                        <path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4"></path>
                        <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3"></path>
                        <path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596"></path>
                        <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                    </svg>
                </div>
                <div wire:loading.delay.longest wire:target="image">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                </div>
                Update Profile Image
            </button>
        </form>
            <button @if(auth()->user()->image == null) disabled @endif class="btn btn-secondary rounded-3" wire:click.prevent="confirmRemove">
                <div wire:loading.remove wire:target="confirmRemove">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M15 8h.01"></path>
                        <path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7"></path>
                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3"></path>
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0"></path>
                        <path d="M22 22l-5 -5"></path>
                        <path d="M17 22l5 -5"></path>
                    </svg>
                </div>
                <div wire:loading wire:target="confirmRemove">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                </div>
                Remove Profile Image
            </button>
        </div>
</div>
