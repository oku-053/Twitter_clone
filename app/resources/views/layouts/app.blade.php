<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="sticky-top">
            <nav class="navbar navbar-expand-md navbar-light bg-white" style="z-index:2">
                <div class="container">
                    <a class=" navbar-brand" href="{{ route('tweets.index') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
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
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        {{-- <div class="container-xxl my-md-4 bd-layout">
            <aside class="bd-sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tweets.index') }}">{{ __('Home') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.show', $user_id = Auth::id()) }}">{{__('Profile')}}</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-md btn-primary" href="{{ route('tweets.create') }}">{{ __('Tweet') }}</a>
        </li>
        </ul>
        </aside>
        <main class="bd-main order-1">
            @yield('content')
        </main>
    </div> --}}

    @auth
    <aside class="bd-sidebar" style="z-index:1">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('tweets.index') }}" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"></svg>
                    {{ __('Home') }}
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"></svg>
                    {{ __('Users') }}
                </a>
            </li>
            <li>
                <a href="{{ route('users.show', $user_id = Auth::id()) }}" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16"></svg>
                    {{__('Profile')}}
                </a>
            </li>
            <li>
                <a class="btn btn-md btn-primary-tweet" href="{{ route('tweets.create') }}">
                    {{ __('Tweet') }}
                </a>
            </li>
        </ul>
        <hr>
        <div class="authDropdown" style="bottom: 0;">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('storage/profile_image/' . Auth::user()->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    @endauth

    <main class="bd-main order-1">
        @yield('content')
    </main>
    </div>
</body>

</html>
