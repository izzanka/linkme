<div>
    <div class="row">
        <div class="col-12">
            <div class="card rounded-4" style="background-color: {{ auth()->user()->appearance->background_color }}">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row mt-3">
                            <div class="col-12">
                                <span class="avatar avatar-xl rounded-circle" style="background-image: url(@if(auth()->user()->image == null) 'https://ui-avatars.com/api/?name={{ auth()->user()->username }}&background=206BC4&color=fff&rounded=true&size=112' @else {{ asset(auth()->user()->image) }} @endif)"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <h2 style="color: {{ auth()->user()->appearance->font_color }}">
                                    {{ auth()->user()->username }}
                                </h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 style="color: {{ auth()->user()->appearance->font_color }}">
                                    {{ auth()->user()->bio }}
                                </h4>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            @foreach ($links as $link)
                                <div wire:key="{{ $link->id }}">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-8">
                                            <div class="d-grid">
                                                <a href="{{ $link->url }}" target="_blank" class="mt-3 btn btn-lg text-nowrap {{ auth()->user()->appearance->button_shadow }} rounded-{{ auth()->user()->appearance->button_rounded }}" style="@if (auth()->user()->appearance->button_outline == true) border-color: {{ auth()->user()->appearance->button_color }}  @else background-color: {{ auth()->user()->appearance->button_color }} @endif">
                                                    @if ($link->is_icon)
                                                        <img src="{{ asset('storage/images/icons/brand-' . lcfirst($link->title) . '.svg') }}" alt="logo-icon" class="me-2">
                                                    @endif
                                                    <h4 style="color: {{ auth()->user()->appearance->button_font_color }}" class="mt-2 mb-2">
                                                        {{ ucfirst($link->title) }}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <a href="{{ route('home') }}" wire:navigate style="color: {{ auth()->user()->appearance->font_color }}">
                                    <h4>LinkMe</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
