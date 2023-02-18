<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $user->username }} | LinkMe</title>

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

    @livewireStyles
</head>

<body style="background-color: {{ $user->appearance->background_color }}" >
    <main>
        <livewire:user.show :user="$user"/>
    </main>
    <div class="fixed-bottom">
        <div class="mb-4 text-center">
            <a href="{{ route('home') }}" class="text-dark"><h4>LinkMe</h4></a>
        </div>
    </div>
    @livewireScripts
</body>

</html>
