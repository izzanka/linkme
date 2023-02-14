@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">

                <livewire:user.profile.profile-index :username="auth()->user()->username" :credential="auth()->user()->credential"/>

                <h2 class="mt-4"><b>Custom appearance</b></h2>
                <h3 class="mt-2">
                    <b>Completely customize your LinkMe profile. Change your background with colors, gradients and images. Choose a button style, change the typeface and more.</b>
                </h3>

                <livewire:user.appearance.appearance-index :appearance="$appearance"/>
            </div>

            <div class="col-1">
                <div class="d-flex" style="height: 100%">
                    <div class="vr"></div>
                </div>
            </div>

            <div class="col-5 mt-2">
                <livewire:user.link.link-preview :appearance="$appearance"/>
            </div>
        </div>

    </div>
@endsection
