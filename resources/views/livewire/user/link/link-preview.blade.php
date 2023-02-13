<div class="card rounded-4" style="background-color: {{ $appearance->background_color }}">
    <div class="card-body text-center">
        <div class="row mt-3">
            <div class="col-12">
                <span class="avatar avatar-xl rounded-circle" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h3 style="color: {{ $appearance->font_color }}">
                    {{ auth()->user()->username }}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5 style="color: {{ $appearance->font_color }}">
                    {{ auth()->user()->credential }}
                </h5>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($links as $link)
                <div class="col-2">

                </div>
                <div class="col-8 mt-3 @if($loop->last) mb-4 @endif" >
                    <a href="{{ $link->url }}" class="text-dark">
                        <div class="card rounded-3" style="background-color: {{ $appearance->button_color }}">
                            <div class="card-body">
                                <div style="color: {{ $appearance->button_font_color }}">
                                    {{  $link->title  }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-2">

                </div>
            @endforeach

        </div>
        <div class="row mt-4">
            <div class="col-12 mb-2">
                <a href="#" class="text-dark"><b>LinkMe</b></a>
            </div>
        </div>
    </div>
</div>
