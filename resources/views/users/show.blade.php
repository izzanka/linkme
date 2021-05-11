@extends('layouts.link')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <img src="{{ asset('img/' . $user->image) }}" alt="" class="rounded-circle img-fluid mx-auto d-block" width="150" height="150"> 
                <div class="text-center mb-4 mt-2">
                    <h2>{{ $user->username }}</h2>
                </div>
                @foreach ($user->links as $link)
                    <div class="link">
                        <a 
                        href="{{ $link->link }}"
                        data-link-id="{{ $link->id }}"
                        class="user-link d-block p-4 mb-4 rounded h3 text-center"
                        target="_blank"
                        rel="nofollow"
                        style="border: 2px solid {{ $user->text_color }}; color: {{ $user->text_color }}"
                        >{{ $link->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection