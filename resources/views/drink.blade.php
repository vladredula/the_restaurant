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
                    <div class="carousel-item active">
                        <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/slide-na1.jpg" class="w-100"/>		
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-col-xl-3">
            @foreach ($items as $subcategory => $item)
                <div class="col" style="min-width: 260px;">
                    <div class="d-grid pt-3">
                        <button data-bs-target="#{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">{{ ($subcategory == 'none' ? $categories[0]['name'] : $subcategory ) }}</button>
                    </div>
                    <ul class="list-group rounded-0 collapse show" id="{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}">
                        @foreach ($item as $drink)
                        <li class="list-group-item bg-dark text-white">{{ $drink['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
