@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <ul class="nav nav-pills nav-fill bg-light">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto">
                    <a class="nav-link rounded-0 {{ (isset($active) && $active == $category['abbreviation']) ? 'active' : (!isset($active) && $id == 0 ? 'active' : '') }}" href="{{ url('drink', ['category' => $category['abbreviation']]) }}">{{ strtoupper($category['name']) }}</a>
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
            @php
                $marker = 0;
                $useFlex = count($items) > 4 ? true : false;
            @endphp
            @if ($useFlex)
                @foreach ($items as $subcat => $item)
                    @if ($marker % 2 == 0)
                    <div class="col">
                        <div class="col d-flex flex-wrap">
                    @endif
                        <div class="col-12">
                            <div class="d-grid pt-3">
                                <button data-bs-target="#{{ preg_replace('/[^a-zA-Z]/', '', $subcat) }}" data-bs-toggle="collapse" class="btn btn-dark rounded-0 text-start">{{ ($subcat == 'none' ? $categories[0]['name'] : $subcat ) }}</button>
                            </div>
                            <ul class="list-group rounded-0 collapse show" id="{{ preg_replace('/[^a-zA-Z]/', '', $subcat) }}">
                                @foreach ($item as $drink)
                                <li class="list-group-item bg-light">{{ $drink['name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @if ($marker % 2 != 0)
                        </div>
                    </div>
                    @endif
                    @php
                        $marker++;
                    @endphp
                @endforeach
                @if ($marker % 2 == 0)
                        </div>
                    </div>
                @endif
            @else
            @foreach ($items as $subcategory => $item)
                <div class="col" style="min-width: 260px;">
                    <div class="d-grid pt-3">
                        <button data-bs-target="#{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}" data-bs-toggle="collapse" class="btn btn-dark rounded-0 text-start">{{ ($subcategory == 'none' ? $categories[0]['name'] : $subcategory ) }}</button>
                    </div>
                    <ul class="list-group rounded-0 collapse show" id="{{ preg_replace('/[^a-zA-Z]/', '', $subcategory) }}">
                        @foreach ($item as $drink)
                        <li class="list-group-item bg-light">{{ $drink['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
