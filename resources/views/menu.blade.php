@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2 pb-2">
        <h1>FOOD MENU</h1>
    </div>
    <div class="row p-2">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Food Cat1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Food Cat2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Food Cat3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Food Cat4</a>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <a href="#foodcatlist1" data-bs-toggle="collapse">
                <p class="h4">Food sub cat 1</p>
            </a>
            <div class="row py-3 collapse" id="foodcatlist1">
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
                <div class="col-sm-6 col-md-4 col-xl-3 py-3">
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
            <a href="#foodcatlist2" data-bs-toggle="collapse">
                <p class="h4">Food sub cat 2</p>
            </a>
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
