@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <ul class="nav nav-pills nav-fill bg-light">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto">
                    <a class="nav-link rounded-0 {{ (isset($active) && $active == $category['abbreviation']) ? 'active' : (!isset($active) && $id == 0 ? 'active' : '') }}" href="{{ url('food', ['category' => $category['abbreviation']]) }}">{{ strtoupper($category['name']) }}</a>
                </li>
            @endforeach
            </ul>
            <div id="foodCarousel" class="carousel slide" data-bs-ride="carousel" style="">
                <div class="carousel-inner">
                    @foreach ($categories as $id => $category)
                    <div class="carousel-item {{ (isset($active)) ? (($active == $category['abbreviation']) ? 'active' : '') : (($id == 0) ? 'active' : '' ) }}">
                        <a href="{{ url('food', ['category' => $category['abbreviation']]) }}"><img src="{{ $category['img_url'] }}" class="w-100" alt="{{ $category['abbreviation'] }}" />	</a>	
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <nav class="navbar">
                <ul class="nav nav-pills mx-auto py-3">
                    @foreach ($items as $subcategory => $item)
                    @php
                        $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
                    @endphp
                    @if ($subcat != 'none')
                    <li class="nav-item">
                        <button class="nav-link" id="{{ $subcat }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $subcat }}" type="button" role="tab" aria-controls="{{ $subcat }}" aria-selected="">{{ strtoupper($subcategory) }}</button>
                        {{-- <a class="nav-link" href="#{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}">{{ strtoupper($subcategory) }}</a> --}}
                    </li>
                    @endif
                {{-- <div class="d-grid pt-3">
                    <button href="#{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}" data-bs-toggle="collapse" class="btn btn-danger rounded-0 text-start">{{ ($subcategory == 'none' ? $categories[0]['name'] : $subcategory ) }}</button>
                </div> --}}
                {{-- <div class="row collapse show row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" id="{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}">
                    @foreach ($item as $food)
                    <div class="col py-3">
                        <div class="card h-100 border-0 rounded-0 bg-dark" style="min-width: 180px;">
                            <img src="{{ $food['img_url'] }}" class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $food['name'] }}</h5>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-white">{{ '¥'.$food['price'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                    @endforeach
                </ul>
            </nav>
            @foreach ($items as $subcategory => $item)
            @php
                $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
            @endphp
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade {{ $subcat == 'none' ? 'active show' : '' }}" id="{{ $subcat }}" role="tabpanel" aria-labelledby="{{ $subcat }}-tab">
                    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 d-flex flex-wrap justify-content-center">
                        @foreach ($item as $food)
                        <div class="col mx-auto p-3">
                            <div class="card h-100 border-0" style="min-width: 180px;">
                                <img src="{{ $food['img_url'] }}" class="card-img-top rounded-0" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $food['name'] }}</h5>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text">{{ '¥'.$food['price'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
