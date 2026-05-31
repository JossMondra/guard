<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:#f6f8fb">
    <div id="app">

        @guest
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto"></ul>

                        <ul class="navbar-nav ms-auto">
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main> 

        @else

            @if(auth()->user())   

                <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
                    <aside class="left-sidebar" style="background-color: white;">
                        <div>
                            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                                <ul id="sidebarnav">
                                    <li class="nav-small-cap">
                                        <span class="hide-menu">Guarderia</span>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link text-dark" href="/Personas" aria-expanded="false">
                                            <i class="ti ti-user-circle"></i>
                                            <span>Personas</span>
                                        </a>
                                    </li>

                                    <li class="sidebar-item">
                                        <a class="sidebar-link justify-content-between text-dark" href="#" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="d-flex">
                                                    <i class="ti ti-aperture"></i>
                                                </span>
                                                <span class="hide-menu">Analytical</span>
                                            </div> 
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link justify-content-between text-dark" href="#" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="d-flex">
                                                    <i class="ti ti-shopping-cart"></i>
                                                </span>
                                                <span class="hide-menu">eCommerce</span>
                                            </div>    
                                        </a>
                                    </li>
    
                                    <li class="nav-small-cap">
                                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                                        <span class="hide-menu">Usuario</span>
                                    </li>

                                    <li class="sidebar-item">
                                        <a class="sidebar-link justify-content-between text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="d-flex">
                                                    <i class="ti ti-login"></i>
                                                </span>
                                                <span class="hide-menu">Cerrar Sesión</span>
                                            </div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>    
                            </nav>
                        </div>
                    </aside>

                    <div class="body-wrapper">
                        <div class="body-wrapper-inner">
                            @yield('content_admin')  
                        </div>
                    </div>
                </div>

            @endif

        @endguest
    </div>
</body>
</html>
