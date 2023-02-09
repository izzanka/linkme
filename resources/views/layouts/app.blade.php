<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LinkMe') }}</title>

    <!-- Tabler Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">

    <!-- Livewire Style -->
    @livewireStyles

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

</head>

<body>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href="..">
                <img src="" width="110" height="32" alt="LinkMe" class="navbar-brand-image">
              </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                @guest
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                        <a href="{{ route('sign-in') }}" class="btn">
                            Sign in
                        </a>
                        <a href="{{ route('sign-up') }}" class="btn">
                            Sign up
                        </a>
                        </div>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm " style="background-image: url(../static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ auth()->user()->username }}</div>
                        </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="" class="dropdown-item">Dashboard</a>
                            <a href="" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('sign-out') }}" onclick="event.preventDefault();
                            document.getElementById('signout-form').submit();" class="dropdown-item">Sign out</a>
                            <form id="signout-form" action="{{ route('sign-out') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
          </div>
        </header>

        <div class="page-wrapper">
            @yield('content')
        </div>

        <footer class="footer footer-transparent d-print-none mt-4">
            <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                        Copyright &copy; 2023 LinkMe
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </footer>
    </div>

    <!-- Tabler Script -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>

    <!-- Livewire Script -->
    @livewireScripts

</body>

</html>
