<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-11">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="navbar-brand fs-4" href="{{ url('/') }}" style="font-family: 'Lobster'">{{ config('app.name') }}</a>
                                    @if (strpos(url()->current(), 'food'))
                                        <p class="mt-2 ps-3 pt-1 fst-italic" style="border-left: 1px solid;">Food Menu</p>
                                    @elseif (strpos(url()->current(), 'drink'))
                                        <p class="mt-2 ps-3 pt-1 fst-italic" style="border-left: 1px solid;">Drinks Menu</p>
                                    @endif
                                </div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarText">
                                    {{-- <ul class="navbar-nav ms-auto">
                                        @guest
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="{{ url('/food') }}">Foods</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="{{ url('/drink') }}">Drinks</a>
                                        </li>
                                        @endguest
                                    </ul> --}}
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
                                        @else
                                            @if (strpos(url()->current(), 'food'))
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ url('/drink') }}">Drinks</a>
                                            </li>
                                            @elseif (strpos(url()->current(), 'drink'))
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ url('/food') }}">Foods</a>
                                            </li>
                                            @endif
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                
                                                <div class="dropdown-menu dropdown-menu-end rounded-0" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
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
                    </div>
                </div>
            </div>
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
