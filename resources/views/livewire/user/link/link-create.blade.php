<div>
    @if (session()->has('message'))
        @include('layouts.message')
    @endif

    <div class="d-grid mt-3" x-data="{open: false}">
        <button @click="open = true" @if (auth()->user()->links()->count() == 5) disabled @endif class="btn btn-purple rounded-4" x-show="!open" x-transition>
            + Add link
        </button>

        <div x-show="open" x-transition>
            <div class="card rounded-4" @click.outside="open = false">
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
</div>






