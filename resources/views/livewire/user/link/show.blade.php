<div>
<div class="mt-3 mb-4">
    @if($links)
        @foreach ($links as $index => $link)
            <div class="card mt-3 rounded-4" wire:key="{{ $link->id }}">
                <div class="card-body">
                    <livewire:user.link.edit :$link :key="$link->id" />
                    <div class="row mt-4">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-1">
                                    @if(file_exists(public_path('storage/images/icons/brand-' . lcfirst($link->title) . '.svg')))
                                        <a href="#" wire:click.prevent="addIconLogo({{ $link->id }})">
                                            @if ($link->is_icon)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M15 8h.01"></path>
                                                    <path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7"></path>
                                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                                    <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0"></path>
                                                    <path d="M22 22l-5 -5"></path>
                                                    <path d="M17 22l5 -5"></path>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-plus text-primary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M15 8h.01"></path>
                                                    <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5"></path>
                                                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4"></path>
                                                    <path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54"></path>
                                                    <path d="M16 19h6"></path>
                                                    <path d="M19 16v6"></path>
                                                </svg>
                                            @endif
                                        </a>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-plus text-secondary" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 8h.01"></path>
                                            <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5"></path>
                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4"></path>
                                            <path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54"></path>
                                            <path d="M16 19h6"></path>
                                            <path d="M19 16v6"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="col-11 @if($link->clicks == 0) text-secondary @endif">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-click" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12l3 0"></path>
                                        <path d="M12 3l0 3"></path>
                                        <path d="M7.8 7.8l-2.2 -2.2"></path>
                                        <path d="M16.2 7.8l2.2 -2.2"></path>
                                        <path d="M7.8 16.2l-2.2 2.2"></path>
                                        <path d="M12 12l9 3l-4 2l-2 4l-3 -9"></path>
                                    </svg>
                                    <strong>{{ $link->total_clicks }} Clicks</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="text-end">
                                <svg role="button" wire:click="confirmDelete({{ $link->id }})" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
</div>
