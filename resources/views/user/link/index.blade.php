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
            <div class="col-6" x-data="{open: false}">
                <div class="card rounded-4" @click.outside="open = false">
                    <div class="card-body">
                        <b>Analytics</b>
                        <a href="#" class="text-dark">
                            <svg x-show="!open" @click.prevent="open = true" xmlns="http://www.w3.org/2000/svg" class="icon float-end icon-tabler icon-tabler-caret-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 10l6 6l6 -6h-12"></path>
                            </svg>
                            <svg x-show="open" @click.prevent="open = false" xmlns="http://www.w3.org/2000/svg" class="icon float-end icon-tabler icon-tabler-caret-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M18 14l-6 -6l-6 6h12"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div x-show="open" x-transition>
                    <div class="card rounded-4 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    Lifetime
                                </div>
                            </div>
                            <div class="row text-center mt-2">
                                <div class="col-6">
                                    Views: {{ auth()->user()->views }}
                                </div>
                                <div class="col-6">
                                    Clicks: {{ auth()->user()->links()->sum('clicks') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:user.link.link-create/>
                <livewire:user.link.link-index/>
            </div>

            <div class="col-1">

            </div>

            <div class="col-5">
                <livewire:user.link.link-preview :appearance="auth()->user()->appearance"/>
            </div>
        </div>

    </div>
@endsection
