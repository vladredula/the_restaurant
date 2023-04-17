<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            #banner {
                padding: 30px 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }

            .navbar {
                z-index: 5;
            }

            #carouselExampleIndicators .carousel-item img {
                object-fit: cover;
                object-position: center;
                overflow: hidden;
                height: 100vh;
                min-height: 667px;
            }

            #menu-item img {
                object-fit: cover;
                object-position: center;
                overflow: hidden;
                height: 50vh;
                width: 100%;
                padding-left: 15px;
                padding-right: 15px;
            }

            .carousel-caption {
                top: 40%;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            }

            ion-icon {
                font-size: 24px;
            }

            h3 {
                font-weight: 600;
                color: white;
            }

            h1 {
                font-weight: 800;
                font-size: 50px;
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
        </style>
    </head>
    <body">
        <header id="banner">
            <nav class="navbar navbar-expand-md navbar-dark bg-transparent">
                <div class="container" style="max-width: 1140px;">
                    <div class="d-flex">
                        <a class="navbar-brand fs-3" href="{{ url('/') }}">{{ config('app.name') }}</a>
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
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="...">
                    <div class="carousel-caption">
                        <h1>Delicious Food</h1>
                        <p class="fs-4">{{ __('content.lorem') }}</p>
                        <a href="#menu">
                            <button class="btn mt-3 border border-3 text-white">{{ __('content.view_menu') }}</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1611077854917-291673c6ae06?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2342&q=80" alt="...">
                    <div class="carousel-caption">
                        <h1>Juicy Burgers</h1>
                        <p class="fs-4">{{ __('content.lorem') }}</p>
                        <a href="#menu">
                            <button class="btn mt-3 border border-3 text-white">{{ __('content.view_menu') }}</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.unsplash.com/photo-1547496502-affa22d38842?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1877&q=80" alt="...">
                    <div class="carousel-caption">
                        <h1>Fresh Salad</h1>
                        <p class="fs-4">{{ __('content.lorem') }}</p>
                        <a href="#menu">
                            <button class="btn mt-3 border border-3 text-white">{{ __('content.view_menu') }}</button>
                        </a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <main id="menu" class="pt-5" style="min-height: 100vh;">
            <div class="container">
                <p class="display-4 text-center" style="font-weight: 800;">{{ __('content.menu') }}</p>
                <p class="back-text text-center">{{ __('content.menu') }}</p>
                <div class="row mt-5 pt-5">
                    <div id="menu-item" class="col-lg-6">
                        <a class="text-decoration-none" href="{{ url('/food') }}">
                            <img src="https://images.unsplash.com/photo-1601894087104-0c18bc34dbd6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1365&q=80" alt="">
                            <p class="text-center fs-1" style="font-weight: 800;">{{ __('content.food') }}</p>
                        </a>
                    </div>
                    <div id="menu-item" class="col-lg-6">
                        <a class="text-decoration-none" href="{{ url('/drink') }}">
                            <img src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1364&q=80" alt="">
                            <p class="text-center fs-1" style="font-weight: 800;">{{ __('content.drink') }}</p>
                        </a>
                    </div>
                </div>
            </div>
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

    </body>
</html>
