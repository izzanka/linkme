<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'LinkMe') }}</title>

    <!-- Tabler Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">

    <style>

        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
            /* overflow: hidden; */
            overflow-x: hidden; /* Hide vertical scrollbar */
        }
    </style>
</head>

<body style="background-color: {{ $user->appearance->background_color }}" >
    {{-- <main class="py-4">
        <div class="text-center">
            <div class="row text-center">
                <span class="avatar avatar-xl rounded-circle" style="background-image: url({{ $user->getFirstMediaUrl('user','thumb') }})"></span>
            </div>
            <div class="row">
                <h2 style="color: {{ $user->appearance->font_color }}">
                    {{ $user->username }}
                </h2>
            </div>
            <div class="row">
                <h4 style="color: {{ $user->appearance->font_color }}">
                    {{ $user->credential }}
                </h4>
            </div>
        </div>
    </main> --}}
    <div class="row text-center">
        {{-- <div class="col-2">

        </div> --}}
        <div class="col-12 mt-5">
            <div class="row">
                <div class="col-12">
                    <span class="avatar avatar-xl rounded-circle" style="background-image: url({{ $user->getFirstMediaUrl('user','thumb') }})"></span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <h2 style="color: {{ $user->appearance->font_color }}">
                        {{ $user->username }}
                    </h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <h4 style="color: {{ $user->appearance->font_color }}">
                        {{ $user->credential }}
                    </h4>
                </div>
            </div>
            <div class="row mt-3">

                @foreach ($user->links as $link)
                    {{-- <div class="col-3">

                    </div>
                    <div class="col-6 mt-3"> --}}
                        {{-- <a href="{{ $link->url }}" class="text-dark">
                            <div class="card rounded-{{ $user->appearance->button_rounded }}" @if ($user->appearance->button_outline == true)
                                style="border-color: {{ $user->appearance->button_color }}" @else  style="background-color: {{ $user->appearance->button_color }}"
                            @endif >
                                <div class="card-body">
                                    <div>
                                        <div style="color: {{ $user->appearance->button_font_color }}">{{  $link->title  }}</div>
                                    </div>
                                </div>
                            </div>
                        </a> --}}

                        {{-- <div class="d-grid gap-2"> --}}
                            <a href="{{ $link->url }}" class="mt-3 btn btn-lg rounded-{{ $user->appearance->button_rounded }}" @if ($user->appearance->button_outline == true)
                                style="border-color: {{ $user->appearance->button_color }}" @else style="background-color: {{ $user->appearance->button_color }}"
                                @endif>
                                <h4 style="color: {{ $user->appearance->button_font_color }}">{{ $link->title }}</h4>
                            </a>
                        {{-- </div> --}}

                    {{-- </div>
                    <div class="col-3">

                    </div> --}}
                @endforeach
            </div>
            <div class="row mb-4 mt-5">
                <div class="col-12">
                    <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
                </div>
            </div>
        </div>
        {{-- <div class="col-2">

        </div> --}}
    </div>
</body>

</html>
