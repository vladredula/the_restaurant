@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <ul class="nav nav-pills nav-fill bg-dark">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto {{ (isset($active) && $active == $category['abbreviation']) ? 'active' : (!isset($active) && $id == 0 ? 'active' : '') }}">
                    <a class="nav-link text-white rounded-0" href="{{ url('drink', ['category' => $category['abbreviation']]) }}">{{ strtoupper($category['name']) }}</a>
                </li>
            @endforeach
            </ul>
            <div id="drinkCarousel" class="carousel slide" data-bs-ride="carousel">
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
        <div class="col-xxl-11">
        @foreach ($items as $subcategory => $item)
            <div class="d-grid pt-3">
                <button href="#{{ $subcategory }}" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">{{ ($subcategory == 'none' ? $categories[0]['name'] : $subcategory ) }}</button>
            </div>
            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" id="{{ $subcategory }}">
                @foreach ($item as $drink)
                <div class="col py-3">
                    <div class="card h-100 border-0 rounded-0 bg-dark" style="min-width: 150px;">
                        <img src="{{ $drink['img_url'] }}" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $drink['name'] }}</h5>
                        </div>
                        <div class="card-footer">
                            <p class="card-text text-white">{{ '¥'.$drink['price'] }}</p>
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
