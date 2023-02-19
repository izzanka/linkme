<div class="d-grid mt-4" x-data="{open: false}">
    {{--  --}}

    @if (session()->has('message'))
        <div class="alert rounded-4 alert-important alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg>
            </div>
            <div>
                {{ session('message') }}
            </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    <button @click="open = true" @if (auth()->user()->links()->count() >= 5) disabled @endif class="btn btn-purple rounded-4" x-show="!open" x-transition>
        + Add link
    </button>

    <div x-show="open" x-transition>
        <div class="card mt-2 rounded-4" @click.outside="open = false">
            <div class="card-body">
                <a class="btn-close float-end" @click="open = false"></a>
                <label class="form-label"><b>Add Link</b></label>
                <form wire:submit.prevent="store" >
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="form-control rounded-3 mt-3 @error('title') is-invalid @enderror" placeholder="Title*" wire:model.lazy="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="form-control rounded-3 mt-3 @error('url') is-invalid @enderror" placeholder="URL*" wire:model.lazy="url">
                            @error('url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-2 mt-3 mb-3">
                            <button class="btn btn-purple rounded-4" type="submit" wire:loading.attr="disabled" wire:target="store">
                                <div wire:loading wire:target="store">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                </div>
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>








</div>



