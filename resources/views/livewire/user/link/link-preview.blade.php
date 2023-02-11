<div class="card rounded-4">
    <div class="card-body text-center">
        <div class="row mt-3">
            <div class="col-12">
                <span class="avatar avatar-xl rounded-circle" style="background-image: url({{ auth()->user()->getFirstMediaUrl('user','thumb') }})"></span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h3>
                    {{ auth()->user()->username }}
                </h3>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <h5 class="text-secondary">
                    {{ auth()->user()->credential }}
                </h5>
            </div>
        </div>
        <div class="row mt-3">
            @foreach ($links as $link)
                <div class="col-2">

                </div>
                <div class="col-8 mt-3 @if($loop->last)@endif">
                    <a href="{{ $link->url }}" class="text-dark">
                        <div class="card rounded-3">
                            <div class="card-body">
                            {{  $link->title  }}
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
