<div>
    <div class="row">
        <div class="col-12">
            <div class="card rounded-4" style="background-color: {{ auth()->user()->appearance->background_color }}">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row mt-3">
                            <div class="col-12">
                                <img loading="lazy" class="avatar avatar-lg rounded-circle" src="{{ auth()->user()->image }}" alt="profile-image">
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
                        <div class="row mt-3 mb-3">
                            @foreach ($links as $link)
                                <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="d-grid">
                                            <a href="{{ $link->url }}" target="_blank" class="mt-3 btn btn-lg text-nowrap rounded-{{ auth()->user()->appearance->button_rounded }}" style="@if (auth()->user()->appearance->button_outline == true) border-color: {{ auth()->user()->appearance->button_color }}  @else background-color: {{ auth()->user()->appearance->button_color }} @endif">
                                                @if ($link->is_icon)
                                                    <img src="{{ asset('storage/images/icons/brand-' . lcfirst($link->title) . '.svg') }}" alt="" class="me-2">
                                                @endif
                                                <h4 style="color: {{ auth()->user()->appearance->button_font_color }}" class="mt-2 mb-2">
                                                    {{ $link->title }}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                <div class="col-2"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
