<div class="mt-4" x-data="{open: false}">
        <div class="text-center">
            <div wire:loading.delay.longer wire:target="updateStatus, delete, update">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
            </div>
        </div>

        @if ($editLink)
        <div x-show="open" x-transition>
            {{-- <livewire:user.link.link-edit /> --}}
            <div class="card rounded-4">
                <div class="card-body" @click.outside="open = false">
                    <a class="btn-close float-end" @click="open = false" wire:click="resetEdit"></a>
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
                                <button class="btn btn-purple rounded-4" type="submit" @click.debounce.500ms="open = false">
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
        </div>
        @endif

        @foreach($links as $link)
            <div class="card mt-3 rounded-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="form-control form-control-flush" placeholder="Title" value="{{ $link->title }}">
                            <br>
                            <input type="text" class="form-control form-control-flush" placeholder="URL" value="{{ $link->url }}">
                        </div>
                        <div class="col-1">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($link->active) checked @endif wire:click="updateStatus({{ $link->active }}, {{ $link->id }})">
                            </label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#" class="text-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 8l.01 0"></path>
                                            <path d="M4 4m0 3a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3z"></path>
                                            <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                                            <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-11">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hand-click" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 13v-8.5a1.5 1.5 0 0 1 3 0v7.5"></path>
                                        <path d="M11 11.5v-2a1.5 1.5 0 0 1 3 0v2.5"></path>
                                        <path d="M14 10.5a1.5 1.5 0 0 1 3 0v1.5"></path>
                                        <path d="M17 11.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47"></path>
                                        <path d="M5 3l-1 -1"></path>
                                        <path d="M4 7h-1"></path>
                                        <path d="M14 3l1 -1"></path>
                                        <path d="M15 6h1"></path>
                                    </svg>
                                    {{ $link->clicks }}
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="#" class="text-dark" @click="open = true" wire:click.prevent="edit({{ $link->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="col-1">
                            <a href="#" wire:click.prevent="delete({{ $link->id }})" class="text-dark float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</div>
