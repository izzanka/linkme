<div class="text-center">
    <div class="row mt-5">
        <div class="col-12">
            <span class="avatar avatar-xl border border-secondary rounded-circle" style="background-image: url({{ $image }})"></span>
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
        @foreach ($links as $link)

            <a href="{{ $link['url'] }}" target="_blank" wire:click="clicked({{ $link['id'] }})">
                <div class="card btn mt-3 text-nowrap rounded-{{ $button_rounded }}" style="width:400px; height:60px; @if ($button_outline == true) border-color: {{ $button_color }}  @else background-color: {{ $button_color }} @endif">
                    <div class="card-body">
                        <h4 style="color: {{ $button_font_color }}">
                            {{ $link['title'] }}
                        </h4>
                    </div>
                </div>
            </a>

        @endforeach
    </div>
    <div class="row mb-4 mt-5">
        <div class="col-12">
            <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
        </div>
    </div>
</div>
