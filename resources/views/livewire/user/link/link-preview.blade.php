<div class="row">
    {{-- <div class="col-2">

    </div> --}}
    <div class="col-12">
        <div class="card rounded-4" style="background-color: {{ $appearance->background_color }}">
            <div class="card-body text-center">
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="avatar border border-dark avatar-xl rounded-circle" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h2 style="color: {{ $appearance->font_color }}">
                            {{ auth()->user()->username }}
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 style="color: {{ $appearance->font_color }}">
                            {{ auth()->user()->credential }}
                        </h4>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach ($links as $link)
                        <div class="col-1">

                        </div>
                        <div class="col-10 mt-3 @if($loop->last) mb-4 @endif" >
                            <a href="{{ $link->url }}" class="text-dark">
                                <div class="card rounded-{{ $appearance->button_rounded }}" @if ($appearance->button_outline == true)
                                    style="border-color: {{ $appearance->button_color }}" @else  style="background-color: {{ $appearance->button_color }}"
                                @endif >
                                    <div class="card-body">
                                        <div>
                                            <div style="color: {{ $appearance->button_font_color }}">{{  $link->title  }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-1">

                        </div>
                    @endforeach

                </div>
                <div class="row mt-4">
                    <div class="col-12 mb-2">
                        <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="col-2">

    </div> --}}
</div>
