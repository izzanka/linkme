@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-important alert-success alert-dismissible mt-4" role="alert">
                <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                </div>
                <div>
                    {{ session('message') }}
                </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        <div class="mt-4">
            <h1>Everything you are. In one, simple link in bio.</h1><br>
            <h2>
                Join {{ $userCount }}+ people &#128514;, using LinkMe for their link in bio (or just me, the creator &#128517;). One link to help you share everything you create, curate and sell from your Instagram, TikTok, Twitter, YouTube and other social media profiles.
            </h2>
            <a href="{{ route('sign-up') }}" class="btn btn-outline-success mt-2">Join now!</a>
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
                                <div class="card rounded-4 mt-3 border border-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="avatar rounded-3" style="background-image: url(...)"></span>
                                            </div>
                                            <div class="col-9">
                                                <h3><a href="">{{ $user->username }}</a></h3>
                                                <h5>{{ $user->title }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>





    </div>




@endsection
