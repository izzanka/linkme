<div class="card rounded-4">
    <div class="card-body">
        <a class="btn-close float-end" @click="open = false"></a>
        <label class="form-label"><b>Edit Link</b></label>
        <form wire:submit.prevent="update">
            <div class="row">
                <div class="col-10">
                    <input type="text" class="form-control rounded-3 mt-3 @error('title') is-invalid @enderror" placeholder="Title*" wire:model="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <input type="text" class="form-control rounded-3 mt-3 @error('url') is-invalid @enderror" placeholder="URL*" wire:model="url">
                    @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-2 mt-3 mb-3">
                    <button class="btn btn-purple rounded-4" type="submit" @click.debounce.500ms="open = false" wire:loading.attr="disabled" wire:target="update">
                        <div wire:loading wire:target="update">
                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                        </div>
                        Edit
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
