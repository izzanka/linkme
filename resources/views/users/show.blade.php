@extends('layouts.link')

@section('content')
<!-- Profile picture-->
<div id="zoom" style="background-color: {{ $user->background_color }}">
    <img src="{{ asset('img/' . $user->image) }}" alt="profile picture" class="profile-picture">
</div>

<!-- Profile name-->
<div class="profile-name"><b>{{ $user->username }}</b></div>

@foreach ($user->links as $link)
    <div class="link">
        <a 
        href="{{ $link->link }}"
        data-link-id="{{ $link->id }}"
        class="user-link links"
        target="_blank"
        rel="nofollow"
        style="border: 1px solid {{ $user->text_color }}; color: {{ $user->text_color }}"
        >{{ $link->name }}</a>
    </div>
@endforeach

<div class="bottom-text">
    <a href="{{ route('home') }}">LinkMe</a>
</div>
@endsection