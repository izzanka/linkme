<div>
    <div class="text-center">
        <div class="row mt-4">
            <div class="col-12">
                <span class="avatar avatar-xl rounded-circle" style="background-image: url(@if($image == null) 'https://ui-avatars.com/api/?name={{ $username }}&background=206BC4&color=fff&rounded=true&size=112' @else {{ $image }} @endif)"></span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h2 style="color: {{ $font_color }}">
                    {{ $username }}
                </h2>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <h4 style="color: {{ $font_color }}">
                    {{ $bio }}
                </h4>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            @foreach ($links as $link)
                <div class="col-8" wire:key={{ $link->id }}>
                    <div class="d-grid">
                        <a wire:click="click({{ $link->id }})" href="{{ $link->url }}" target="_blank" class="mt-3 btn btn-lg text-nowrap {{ $button_shadow }} rounded-{{ $button_rounded }}" style="@if ($button_outline == true) border-color: {{ $button_color }}  @else background-color: {{ $button_color }} @endif">
                            @if ($link->is_icon)
                                <img src="{{ asset('storage/images/icons/brand-' . lcfirst($link->title) . '.svg') }}" alt="logo-icon" class="me-2">
                            @endif
                            <h4 style="color: {{ $button_font_color }}" class="mt-2 mb-2">
                                {{ ucfirst($link->title) }}
                            </h4>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <a href="{{ route('home') }}" style="color: {{ $font_color }}">
                <h4>
                    LinkMe
                </h4>
            </a>
        </div>
    </div>
</div>
