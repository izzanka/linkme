@extends('layouts.app')

@section('style')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="content">
            <div class="title m-b-md">
                LinkMe
            </div>
            <form class="form-inline my-2 my-lg-0" action="/" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search By Username" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0 {{ session('success') ? 'is-valid' : '' }}" type="submit">Search</button><br>
                @if (session()->has('error'))
                    <div class="ml-2 text-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                        <div class="valid-feedback">{{ session('success') }}</div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
