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

        <link rel="shortcut icon" href="{{ asset('images/R.png') }}">

        <style>
            h1{
                text-shadow: 1px 1px 2px #3f3f3f;
            }

            .back-text {
                z-index: -1;
                line-height: 1;
                left: 50%;
                margin-top: -60px;
                transform: translateX(-50%);
                font-weight: 800;
                font-size: 200px;
                position: absolute;
                width: 100%;
                color: #ededed;
                text-transform: uppercase;
            }

            ion-icon {
                font-size: 24px;
            }

            h3 {
                font-weight: 600;
                color: white;
            }
        </style>
    </head>
    <body>
        <div id="app">
            @browser('isInApp')
            @else
            <header id="banner" style="padding-top: 30px">
                <nav class="navbar navbar-expand-md">
                    <div class="container" style="max-width: 1140px;">
                        <div class="d-flex">
                            <a class="navbar-brand fs-2" href="{{ url('/') }}" style="font-family: Lobster;">{{ config('app.name') }}</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
    
                                <li class="nav-item pe-3">
                                    <a class="nav-link" href="#">{{ __('content.about') }}</a>
                                </li>
                                <li class="nav-item pe-3">
                                    <a class="nav-link" href="#">{{ __('content.contact') }}</a>
                                </li>
                                @if (!strpos(url()->current(), 'food'))
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ url('/food') }}">{{ __('content.food_menu') }}</a>
                                    </li>
                                @endif
                                @if (!strpos(url()->current(), 'drink'))
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ url('/drink') }}">{{ __('content.drink_menu') }}</a>
                                    </li>
                                @endif
                                @guest
                                    <li class="nav-item dropdown ps-3">
                                        <a id="userDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <ion-icon name="person-outline"></ion-icon>
                                        </a>
    
                                        <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="userDropdown">
                                            @if (Route::has('login'))
                                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('form.login') }}</a>
                                            @endif
                                            @if (Route::has('register'))
                                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('form.register') }}</a>
                                            @endif
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item dropdown ps-3">
                                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <ion-icon name="person"></ion-icon>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end bg-white;" aria-labelledby="navbarDropdown">
                                            <h5 class="dropdown-header">{{ Auth::user()->name }}</h5>
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
                                <li class="nav-item dropdown ps-3">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <ion-icon name="language"></ion-icon>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                                <a class="dropdown-item" href="{{ route('lang-switch', $lang) }}"><span class="fi fi-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            @endbrowser
            <main style="min-height: 100vh;">
                @yield('content')
            </main>
            <footer class="bg-dark">
                <div class="container" style="max-width: 1140px;">
                    <div class="row pt-5">
                        <div class="col-md-4 mb-5">
                            <h3>{{ __('content.about') }}</h3>
                            <p class="mb-5 text-light">{{ __('content.lorem') }}</p>
                        </div>
                        <div class="col-md-5 mb-5">
                            <div class="mb-5">
                                <h3>{{ __('content.open_hour') }}</h3>
                                <p class="text-light"><strong class="d-block">{{ __('content.mon_to_fri') }}</strong> 10AM - 07PM</p>
                            </div>
                            <div>
                                <h3>{{ __('content.contact_i') }}</h3>
                                <ul class="list-unstyled footer-link text-light">
                                    <li class="d-block mb-3">
                                        <span class="d-block">{{ __('content.address') }}:</span>
                                        <span class="text-white">{{ __('content.address_i') }}</span>
                                    </li>
                                    <li class="d-block mb-3">
                                        <span class="d-block">{{ __('content.telephone') }}:</span>
                                        <span class="text-white">+81 80 1234 5678</span>
                                    </li>
                                    <li class="d-block mb-3">
                                        <span class="d-block">{{ __('content.email') }}:</span>
                                        <span class="text-white">vdredula@gmail.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 mb-5">
                            <h3>{{ __('content.quick_link') }}</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3"><a class="text-decoration-none" href="#">{{ __('content.terms') }}</a></li>
                                <li class="mb-3"><a class="text-decoration-none" href="#">{{ __('content.disclaimer') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        
        {{-- Ionic icons --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        </div>
    </body>
</html>
