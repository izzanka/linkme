<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Everything you are. In one, simple link.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $username_slug }} | LinkMe</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    </head>
    <body style="background-color: {{ $background_color }}">
        <livewire:user.show :user="$username_slug" />
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    </body>
</html>
