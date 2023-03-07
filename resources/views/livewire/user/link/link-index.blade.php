<div class="mt-4" x-data="{open: false}">
        <div class="text-center">
            <div wire:loading.delay.longer wire:target="updateStatus, delete, links">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
            </div>
        </div>

        @foreach($links as $index => $link)
            <div class="card mt-3 rounded-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="@error('links.' . $index . '.title') is-invalid @enderror form-control form-control-flush" placeholder="Title" wire:model.lazy="links.{{ $index }}.title">
                            @error('links.' . $index . '.title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-1">
                            @livewire('user.link.link-status', ['link' => $link->id], key($link->id))
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11">
                            <input type="text" class="@error('links.' . $index . '.url') is-invalid @enderror mt-3 form-control form-control-flush" placeholder="URL" wire:model.lazy="links.{{ $index }}.url">
                            @error('links.' . $index . '.url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 @if($link->clicks == 0) text-secondary @endif">
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
                                    {{ $link->clicks }} clicks
                                </div>

                            </div>
                        </div>
                        <div class="col-2">
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
