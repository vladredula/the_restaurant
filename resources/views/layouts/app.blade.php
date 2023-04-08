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

        <style>
            h1{
                text-shadow: 1px 1px 2px #3f3f3f;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <div class="container">
                @mobile
                <div class="fixed-bottom">
                    <ul class="nav nav-fill justify-content-center bg-dark">
                        <li class="nav-item my-auto">
                            <a class="nav-link text-white" aria-current="page" href="{{ url('/') }}">
                                <span><x-fluentui-home-more-24 style="height: 25px; width: 25px;"/></span>
                                <br>{{ __('content.home') }}
                            </a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link text-white" aria-current="page" href="{{ url('/food') }}">
                                <span><x-fluentui-food-20 style="height: 25px; width: 25px;"/></span>
                                <br>{{ __('content.food') }}
                            </a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link text-white" aria-current="page" href="{{ url('/drink') }}">
                                <span><x-fluentui-drink-wine-16 style="height: 25px; width: 25px;"/></span>
                                <br>{{ __('content.drink') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown my-auto">
                            <a class="nav-link text-white" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><x-fluentui-globe-24 style="height: 25px; width: 25px;"/></span>
                                <br>{{Config::get('languages')[App::getLocale()]['display']}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="fi fi-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                @endif
                            @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                @else
                <div class="row justify-content-center">
                    <div class="col-xxl-11">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <div class="container-fluid">
                                <div class="d-flex">
                                    <a class="navbar-brand fs-4" href="{{ url('/') }}" style="font-family: 'Lobster'">{{ config('app.name') }}</a>
                                    @if (strpos(url()->current(), 'food'))
                                        <p class="mt-2 ps-3 pt-1 fst-italic" style="border-left: 1px solid;">{{ __('content.food_menu') }}</p>
                                    @elseif (strpos(url()->current(), 'drink'))
                                        <p class="mt-2 ps-3 pt-1 fst-italic" style="border-left: 1px solid;">{{ __('content.drink_menu') }}</p>
                                    @endif
                                </div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarText">
                                    <ul class="navbar-nav ms-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('form.login') }}</a>
                                                </li>
                                            @endif
                
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('form.register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            @if (strpos(url()->current(), 'food'))
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ url('/drink') }}">{{ __('content.drink') }}</a>
                                            </li>
                                            @elseif (strpos(url()->current(), 'drink'))
                                            <li class="nav-item">
                                                <a class="nav-link" aria-current="page" href="{{ url('/food') }}">{{ __('content.food') }}</a>
                                            </li>
                                            @endif
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('form.logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="fi fi-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach (Config::get('languages') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="fi fi-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                                @endif
                                            @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                @endmobile
            </div>
            <main class="pb-5 mb-2">
                @yield('content')
            </main>
        </div>
    </body>
</html>
