<div class="d-grid mt-4" x-data="{open: false}">
    {{--  --}}

    @if (session()->has('error-msg'))
        <div class="alert rounded-4 alert-important alert-danger alert-dismissible" role="alert">
            <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg>
            </div>
            <div>
                    {{ session('error-msg') }}
            </div>
            </div>
            <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    <button @if($totalLinks >= 5) disabled @endif @click="open = true" class="btn btn-purple rounded-4" x-show="!open" x-transition>
        + Add link
    </button>

    <div x-show="open" x-transition>
        <div class="card mt-2 rounded-4">
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
                            <button class="btn btn-purple rounded-4" type="submit" @if ($errors->any() || $disabled == true)
                                disabled
                            @endif @click.debounce.500ms="open = false">
                                <div wire:loading wire:target="store">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                </div>
                                Add
                            </button>
                        </div>
                    </div>
                </form>

                {{-- <hr>
                <label class="text-secondary"><b>Inspired by your interests</b></label>
                <div class="row text-center">
                    <div class="col-3 mt-3">
                        <button class="btn" wire:click="useSocialMedia('youtube')" class="stretched-link text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                                <path d="M10 9l5 3l-5 3z"></path>
                            </svg>Youtube
                        </button>
                    </div>

                    <div class="col-3 mt-3">
                        <button class="btn" wire:click="useSocialMedia('twitter')" class="stretched-link text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path>
                            </svg>Twitter
                        </button>
                    </div>
                </div> --}}


            </div>
        </div>
</div>








</div>



