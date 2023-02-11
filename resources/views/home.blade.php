@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-4">
            <h1>Everything you are. In one, simple link in bio.</h1><br>
            <h2>
                Join {{ $userCount }}+ people &#128514;, using LinkMe for their link in bio (or just me, the creator &#128517;). One link to help you share everything you create, curate and sell from your Instagram, TikTok, Twitter, YouTube and other social media profiles.
            </h2>

                @guest
                <a href="{{ route('sign-up') }}" class="rounded-4 btn btn-outline-success mt-2">
                    Join Now!
                </a>
                @else
                <a href="#" class="btn btn-outline-success mt-2 rounded-4">
                    Thanks!
                </a>
                @endguest
        </div>

        <hr>

        <div class="row mt-4">
            <div class="col-6 text-center">
                <img src="{{ asset('storage/assets/preview.png') }}" class="rounded-4 bg-light border border-dark"alt="preview">
                <h6 class="mt-2">*preview</h6>

            </div>
            <div class="col-6">
                <livewire:user.search />
                <h2 class="mt-3">
                    Latest people that already join:<br>
                </h2>
                <div class="mt-3">
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-6">
                                <a href="{{ $user->username_slug }}" class="text-dark">
                                <div class="card rounded-4 mt-3 border border-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <span class="avatar avatar-md rounded-circle" style="background-image: url({{ $user->getFirstMediaUrl('user','thumb') }})"></span>
                                            </div>
                                            <div class="col-8">
                                                <h3>{{ $user->username }}</h3>
                                                <h5 class="text-secondary">{{ $user->credential }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>





    </div>




@endsection
