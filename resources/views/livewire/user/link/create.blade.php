<div>
    <div class="mt-3" x-data="{open: false}">
        <button class="btn w-100 btn-pill btn-purple" @click="open = true" x-show="!open" x-transition @if($total_links >= 5) disabled @endif>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20.985 12.518a9 9 0 1 0 -8.45 8.466"></path>
                <path d="M3.6 9h16.8"></path>
                <path d="M3.6 15h11.4"></path>
                <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                <path d="M12.5 3a16.998 16.998 0 0 1 2.283 12.157"></path>
                <path d="M16 19h6"></path>
                <path d="M19 16v6"></path>
             </svg>
            <strong>Add Link</strong>
        </button>

        <div x-show="open" x-transition>
            <div class="card rounded-4" @click.outside="open = false" x-on:link-created.window="open = false">
                <div class="card-body">
                    <a class="btn-close float-end" @click="open = false"></a>
                    <label class="form-label"><strong>Add Link</strong></label>
                    <form wire:submit="store">
                        <div class="row mt-4">
                            <div class="col-9">
                                <input type="text" class="form-control @error('form.title') is-invalid @enderror" wire:model.blur="form.title" placeholder="Title *" />
                                @error('form.title')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-9">
                                <input type="text" class="form-control @error('form.url') is-invalid @enderror" wire:model.blur="form.url" placeholder="URL *" />
                                @error('form.url')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-purple btn-pill w-100">
                                    <div wire:loading.remove wire:target="store">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20.985 12.518a9 9 0 1 0 -8.45 8.466"></path>
                                            <path d="M3.6 9h16.8"></path>
                                            <path d="M3.6 15h11.4"></path>
                                            <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                                            <path d="M12.5 3a16.998 16.998 0 0 1 2.283 12.157"></path>
                                            <path d="M16 19h6"></path>
                                            <path d="M19 16v6"></path>
                                         </svg>
                                    </div>
                                    <div wire:loading wire:target="store">
                                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    </div>
                                    <strong>Add</strong>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
