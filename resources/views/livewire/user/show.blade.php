<div class="text-center">
    <div class="row mt-5">
        <div class="col-12">
            <span class="avatar avatar-xl rounded-circle" style="background-image: url({{ $image }})"></span>
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
    <div class="row mt-3">
        {{-- @foreach ($links as $link)
            <div class="col-8">
                <a href="{{ $link['url'] }}" target="_blank" wire:click="clicked({{ $link['id'] }})">
                    <div class="card btn mt-3 text-nowrap rounded-{{ $button_rounded }}" style="@if ($button_outline == true) border-color: {{ $button_color }}  @else background-color: {{ $button_color }} @endif">
                        <div class="card-body">
                            <h4 style="color: {{ $button_font_color }}">
                                {{ $link['title'] }}
                            </h4>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach --}}
        @foreach ($links as $link)
        <div class="col-3">

        </div>

        <div class="col-6">
            <div class="d-grid">
                <a href="{{ $link['url'] }}" target="_blank" wire:click="clicked({{ $link['id'] }})" class="mt-3 btn btn-lg text-nowrap rounded-{{ $button_rounded }}" style="@if ($button_outline == true) border-color: {{ $button_color }}  @else background-color: {{ $button_color }} @endif">
                    <h4 style="color: {{ $button_font_color }}" class="mt-2 mb-2">
                        {{ $link['title'] }}
                    </h4>
                </a>
            </div>
        </div>
        <div class="col-3">

        </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
        </div>
    </div>
</div>
