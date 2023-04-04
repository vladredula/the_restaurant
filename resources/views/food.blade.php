@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11">
            <ul class="nav nav-pills nav-fill bg-light">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto">
                    <button class="nav-link rounded-0 {{ $id == 0 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#foodCarousel" data-bs-slide-to="{{ $id }}" type="button" role="tab" aria-selected="{{ $id == 0 ? 'true' : 'false' }}">{{ strtoupper($category['name']) }}</button>
                </li>
            @endforeach
            </ul>
            <div id="foodCarousel" class="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    @foreach ($categories as $id => $category)
                    <div class="carousel-item {{ (isset($active)) ? (($active == $category['abbreviation']) ? 'active' : '') : (($id == 0) ? 'active' : '' ) }}">
                        <img src="{{ $category['img_url'] }}" class="w-100" alt="{{ $category['abbreviation'] }}" />	
                        <nav class="navbar">
                            <ul class="nav nav-pills mx-auto py-3">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($items[$category['abbreviation']] as $subcategory => $item)
                                @php
                                    $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
                                @endphp
                                <li class="nav-item mx-auto px-1">
                                    <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $subcat }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $subcat }}" type="button" role="tab" aria-controls="{{ $subcat }}">
                                        @if ($subcat != 'none')
                                        {{ strtoupper($subcategory) }}
                                        @else
                                        {{ strtoupper($category['name']) }}
                                        @endif
                                    </button>
                                </li>
                                @php
                                    $index++;
                                @endphp
                                @endforeach
                            </ul>
                        </nav>
                        @php
                            $index = 0;
                        @endphp
                        @foreach ($items[$category['abbreviation']] as $subcategory => $item)
                        @php
                            $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
                        @endphp
                        <div class="tab-content">
                            <div class="tab-pane fade {{ ($subcat == 'none' || $index == 0) ? 'active show' : '' }}" id="{{ $subcat }}" role="tabpanel" aria-labelledby="{{ $subcat }}-tab">
                                <div class="row row-cols-xs-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 d-flex flex-wrap justify-content-center">
                                    @foreach ($item as $food)
                                    <div class="col mx-auto px-3 pb-5">
                                        <div class="card h-100 border-0" style="min-width: 180px;">
                                            <img src="{{ $food['img_url'] }}" class="card-img-top rounded-0" alt="...">
                                            <div class="card-body bg-light d-flex flex-column">
                                                <p class="card-title fw-bold">
                                                    @if (App::getLocale() != 'en')
                                                        {{ $food['tname'] }}
                                                    @else
                                                        {{ $food['name'] }}
                                                    @endif
                                                </p>
                                                <div class="text-muted text-end mt-auto">
                                                @foreach ($food['price'] as $size => $price)
                                                    {{ $size != '1' ? $size." : " : "" }}{{ ($price) }}円 
                                                    @if (count($food['price']) > 1)
                                                        <br>
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php
                            $index++;
                        @endphp
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
