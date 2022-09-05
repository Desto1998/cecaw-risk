<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CECAW') }}</title>

    <!-- Scripts -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{ asset('images/logo-light.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/fontawesome/css/all.min.css') }}" rel="stylesheet">
<style>
    svg {
        /*vertical-align: middle;*/
        width: 20px!important;
    }
    nav.items-center{
        justify-content: space-between;
        display: flex;
        width: 100%;
    }
    .bg-pink{
        --bs-bg-opacity: 1;
        background-color: deeppink!important;
    }
    .over:hover{
        color: yellow!important;
        animation-duration: 3s;
    }
    .text-pink{
        color: hotpink!important;
        font-weight: bold!important;
    }
</style>
{{--    <script src="{{ asset('lib/jquery/dist/jquery.min.js') }}" ></script>--}}
{{--    <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}" ></script>--}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-pink shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'CECAW') }}--}}
                    <div class="row my-3 text-center justify-content-center">
                        <img src="{{ asset('images/logo-light.png') }}" class="" style="width: 100px; height: 50px">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-md-5 ms-ms-1 justify-content-center">
                        <li class="nav-item ms-md-5 ms-sm-0">
                            <a class="nav-link over text-white fw-bold" href="{{ url('/') }}">{{ __('ACCUEIL') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link over text-white fw-bold" href="{{ route('risque') }}">{{ __('RISQUES') }}</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('client') }}">{{ __('CLIENTS') }}</a>--}}
{{--                        </li>--}}
                        @if (Auth::user()->is_admin==1)
                        <li class="nav-item">
                            <a class="nav-link over text-white fw-bold" href="{{ route('user.all') }}">{{ __('UTILISATEURS') }}</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle over text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fa fa-user"></i>  {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock"></i>  {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
