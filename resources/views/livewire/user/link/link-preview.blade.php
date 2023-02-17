<div class="row">
    {{-- <div class="col-2">

    </div> --}}
    <div class="col-12">
        <div class="card rounded-4" style="background-color: {{ $appearance->background_color }}">
            <div class="card-body">
                <div class="text-center">
                    <div class="row mt-3">
                        <div class="col-12">
                            <span class="avatar avatar-xl rounded-circle border border-secondary" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h2 style="color: {{ $appearance->font_color }}">
                                {{ auth()->user()->username }}
                            </h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <h4 style="color: {{ $appearance->font_color }}">
                                {{ auth()->user()->bio }}
                            </h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @foreach ($links as $link)
                            <a href="{{ $link->url }}">
                                <div class="card btn mt-3 text-nowrap rounded-{{ $appearance->button_rounded }}" style="width:400px; height:60px; @if ($appearance->button_outline == true) border-color: {{ $appearance->button_color }}  @else background-color: {{ $appearance->button_color }} @endif">
                                    <div class="card-body">
                                        <h4 style="color: {{ $appearance->button_font_color }}">
                                            {{ $link->title }}
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="col-2">

    </div> --}}
</div>
