@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        @if (session()->has('message'))
            <div class="alert rounded-4 alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg>
                </div>
                <div>
                    {{ session('message') }}
                </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        <div class="row">
            <div class="col-6">

                <livewire:user.profile.profile-index :username="auth()->user()->username" :bio="auth()->user()->bio"/>

                <h2 class="mt-4"><b>Custom appearance</b></h2>
                <h3 class="mt-2">
                    <b>Completely customize your LinkMe profile. Change your background with colors, gradients and images. Choose a button style, change the typeface and more.</b>
                </h3>

                <livewire:user.appearance.appearance-index :appearance="$appearance"/>
            </div>

            <div class="col-1">

            </div>

            <div class="col-5 mt-2">
                <livewire:user.link.link-preview :appearance="$appearance"/>
            </div>
        </div>

    </div>
@endsection
