@extends('layouts.app')

@section('content')

    <div style="background-color: #254F1A">
        <div class="container">
            <div class="row">

            <div class="col-6 mt-4">
                <div class="fw-bolder lh-1" style="font-size:90px; color:#D2E823">Everything you are. In one, simple link in bio.</div>
                <div class="fw-bold mt-4 text-start" style="font-size:20px; color:#D2E823">
                    Join {{ $userCount }}+ people, using LinkMe for their link in bio. One link to help you share everything you create, curate and sell from your Instagram, TikTok, Twitter, YouTube and other social media profiles.
                </div>

            </div>
            <div class="col-6 mt-4 text-center mb-4">
                <img src="{{ asset('storage/assets/preview.png') }}" class="rounded-4 bg-light border border-dark"alt="preview">
            </div>
        </div>

        </div>
    </div>

    <div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 text-center fw-bolder" style="font-size:50px">
                    The only link in bio trusted by {{ $userCount }}+ people.
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        @foreach ($users as $user)
                            <a target="_blank" href="{{ route('users.show', $user->username_slug) }}">
                                <span class="avatar avatar-xl rounded-circle border border-secondary" style="background-image: url({{ $user->getFirstMediaUrl('user','thumb') }})"></span>
                            </a>
                        @endforeach
                    </marquee>
                </div>
            </div>

        </div>
    </div>

    <div style="background-color: #502274" class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center fw-bolder mt-4" style="font-size:50px; color:#E9C0E9">
                    Jumpstart your corner of the internet today.
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <livewire:user.search/>
                </div>
            </div>

        </div>
    </div>




@endsection
