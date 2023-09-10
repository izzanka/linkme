<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Everything you are. In one, simple link.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'LinkMe' }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="page">
            <!-- Navbar -->
            <header class="navbar navbar-expand-md navbar-light d-print-none">
              <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('home') }}">
                        LinkMe
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    @guest
                        <div class="nav-item d-none d-md-flex me-3">
                            <div class="btn-list">
                            <a href="{{ route('login') }}" wire:navigate class="btn btn-outline-primary btn-pill {{ request()->route()->named('login') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                                 </svg>
                                Sign in
                            </a>
                            <a href="{{ route('register') }}" wire:navigate class="btn btn-outline-primary btn-pill {{ request()->route()->named('register') ? 'active' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M16 19h6"></path>
                                    <path d="M19 16v6"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                 </svg>
                                Sign up
                            </a>
                            </div>
                        </div>
                    @else
                        <div class="nav-item d-none d-md-flex me-2">
                            <div class="btn-list">
                                <a href="{{ route('links.index') }}" class="btn btn-outline-primary btn-pill {{ request()->route()->named('links.index') ? 'active' : ''}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-unlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5"></path>
                                        <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5"></path>
                                        <path d="M16 21l0 -2"></path>
                                        <path d="M19 16l2 0"></path>
                                        <path d="M3 8l2 0"></path>
                                        <path d="M8 3l0 2"></path>
                                    </svg>
                                    Links
                                </a>
                                <a href="{{ route('appearance.index') }}" class="btn btn-outline-primary btn-pill {{ request()->route()->named('appearance.index') ? 'active' : ''}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                                    </svg>
                                    Appearance
                                </a>
                            </div>
                        </div>
                        <div class="nav-item dropdown me-2">
                            <livewire:user.link.navbar />
                        </div>
                        <div class="nav-item dropdown">
                            <livewire:user.appearance.navbar />
                        </div>
                    @endguest
                </div>
              </div>
            </header>
            <div class="page-wrapper">
                {{ $slot }}
            </div>

            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl mt-2">
                  <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="https://github.com/izzanka/linkme" target="_blank" class="link-secondary" rel="noopener"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path>
                         </svg> Source code</a></li>
                      </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                          Copyright &copy; 2023
                          <a href=".." class="link-secondary">LinkMe</a>.
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
        <script>
            window.addEventListener('swal',function(e){
                const data = e.detail[0];

                if(data == undefined){
                    Swal.fire({
                        title: e.detail.title,
                        icon: e.detail.icon,
                    });

                }else{
                    Swal.fire({
                        title: data.title,
                        icon: data.icon,
                    });
                }
            });

            window.addEventListener('swal-dialog',function(e){
                const data = e.detail[0];
                Swal.fire({
                    title: data.title,
                    icon: data.icon,
                    showCancelButton: data.showCancelButton,
                    confirmButtonText: data.confirmButtonText,
                    cancelButtonColor: data.cancelButtonColor,
                    confirmButtonColor: data.confirmButtonColor,
                }).then((result) => {
                    if(result.isConfirmed){
                        if(data.name == 'link'){
                            Livewire.dispatch('swal-link-delete', {link: data.link_id})
                        }

                        if(data.name == 'appearance'){
                            Livewire.dispatch('swal-appearance-reset');
                        }

                        if(data.name == 'image'){
                            Livewire.dispatch('swal-profile-remove');
                        }
                    }
                });
            });
        </script>
    </body>
</html>
