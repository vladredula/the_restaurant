@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2 pb-2">
        <p>FOOD MENU</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8">
            <nav class="nav nav-pills flex-column flex-sm-row bg-dark">

            @foreach ($categories as $id => $category)
                <a class="flex-sm-fill text-center nav-link text-white rounded-0" {{ (empty($active) && $id == 0 ) ? 'aria-current=true' : '' }} href="{{ url('food', ['category' => $category['abbreviation']]) }}">{{ $category['name'] }}</a>
            @endforeach
            </nav>
            <div id="foodCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($categories as $id => $category)
                    <div class="carousel-item {{ (empty($active) && $id == 0 ) ? 'active' : (($active == $category['abbreviation']) ? 'active' : '') }}">
                        <img src="{{ $category['img_url'] }}" class="w-100" alt="{{ $category['abbreviation'] }}" />		
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- @foreach ($categories as $category)
    <div class="row justify-content-center" id="{{ $category['abbreviation'] }}">
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
    @endforeach --}}
</div>
@endsection
