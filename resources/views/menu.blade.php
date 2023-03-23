@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2 pb-2">
        <p>FOOD MENU</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <nav class="nav nav-pills flex-column flex-sm-row navbar-dark bg-dark">
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" data-bs-target="#menuCarousel" data-bs-slide-to="0" href="#">FOOD CAT1</a>
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" data-bs-target="#menuCarousel" data-bs-slide-to="1" aria-current=true href="#">FOOD CAT2</a>
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" data-bs-target="#menuCarousel" data-bs-slide-to="2" href="#">FOOD CAT3</a>
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" data-bs-target="#menuCarousel" data-bs-slide-to="3" href="#">FOOD CAT4</a>
            </nav>
            <div id="menuCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/starters.jpg" class="w-100" alt="starters" />		
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/jdg.jpg" class="w-100" alt="jdg" />		
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/steaks.jpg" class="w-100" alt="jdg" />
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/pasta.jpg" class="w-100" alt="jdg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <div class="d-grid pt-2">
                <button href="#foodcatlist1" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">Food sub cat 1</button>
            </div>
            <div class="row py-3 collapse" id="foodcatlist1">
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text text-white">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text text-white">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid pt-2">
                <button href="#foodcatlist2" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">Food sub cat 1</button>
            </div>
            <div class="row py-3 collapse" id="foodcatlist2">
                <div class="col col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 
        <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2015/06/Burger-Fridays-Cheeseburger.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Food 1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Translation</h6>
                            <p class="card-text">Food Description blah blah blah blah blah blah blah blah blah.</p>
                            <p class="card-text">9,999円(Tax included 9,999円)</p>
                        </div>
                    </div>
                </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    -->
</div>
@endsection
