@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <ul class="nav nav-pills nav-fill bg-dark">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto {{ (isset($active) && $active == $category['abbreviation']) ? 'active' : (!isset($active) && $id == 0 ? 'active' : '') }}">
                    <a class="nav-link text-white rounded-0" href="{{ url('food', ['category' => $category['abbreviation']]) }}">{{ strtoupper($category['name']) }}</a>
                </li>
            @endforeach
            </ul>
            <div id="foodCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($categories as $id => $category)
                    <div class="carousel-item {{ (isset($active)) ? (($active == $category['abbreviation']) ? 'active' : '') : (($id == 0) ? 'active' : '' ) }}">
                        <img src="{{ $category['img_url'] }}" class="w-100" alt="{{ $category['abbreviation'] }}" />		
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
        @foreach ($items as $subcategory => $item)
            <div class="d-grid pt-3">
                <button href="#{{ $subcategory }}" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">{{ ($subcategory == 'none' ? $categories[0]['name'] : $subcategory ) }}</button>
            </div>
            <div class="row" id="{{ $subcategory }}">
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
</div>
@endsection
