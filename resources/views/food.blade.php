@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2 pb-2">
        <p>FOOD MENU</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <nav class="nav nav-pills flex-column flex-sm-row navbar-dark bg-dark">
            @foreach ($categories as $category)
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" data-bs-toggle="collapse" data-bs-target="#foodCarousel" data-bs-slide-to="{{ $category['id'] }}" aria-current=true href="#{{ $category['abbreviation'] }}">{{ $category['name'] }}</a>
            @endforeach
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
    @foreach ($categories as $category)
    <div class="row collapse justify-content-center" id="{{ $category['abbreviation'] }}">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
        @foreach ($items[$category['abbreviation']] as $subcategory => $item)
            @if ($subcategory != 'none')
            <div class="d-grid pt-3">
                <button href="#{{ $subcategory }}" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">{{ $subcategory }}</button>
            </div>
            @endif
            <div class="row collapse" id="{{ $subcategory }}">
                @foreach ($item as $food)
                <div class="col-sm-6 col-md-4 col-lg-3 py-3">
                    <div class="card rounded-0 bg-dark">
                        <img src="{{ $food['img_url'] }}" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $food['name'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $food['tname'] }}</h6>
                            <p class="card-text text-white">{{ '¥'.$food['price'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection
