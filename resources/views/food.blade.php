@extends('layouts.app')

@section('content')
<div class="container">
    <p class="display-4 text-center" style="font-weight: 800;">{{ __('content.food_menu') }}</p>
    <p class="back-text text-center">{{ __('content.food') }}</p>
</div>
<div class="container mt-4" style="max-width: 1140px;">
    @if(isset($error))
        <div class="alert alert-warning text-center">
            {{ $error }}
        </div>
    @else
        <ul class="nav nav-pills nav-fill bg-dark">
            @foreach ($categories as $id => $category)
                <li class="nav-item mx-auto" style="min-width: 100px;">
                    <button class="nav-link rounded-0 {{ $id == 0 ? 'active' : '' }}" 
                        data-bs-toggle="pill" 
                        data-bs-target="#{{ $category['abbr'] }}" 
                        type="button" 
                        role="tab"
                        aria-selected="{{ $id == 0 ? 'true' : 'false' }}">
                            {{ strtoupper(__('content.'.$category['name'])) }}
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach ($categories as $id => $category)
                <div class="tab-pane {{ ($id == 0) ? 'active show' : '' }}" 
                    id="{{ $category['abbr'] }}" 
                    role="tabpanel" 
                    aria-labelledby="{{ $category['abbr'] }}-tab">
                        <img src="{{ $category['imgUrl'] }}" class="w-100" alt="{{ $category['abbr'] }}" />
                        <nav class="navbar">
                            <ul class="nav nav-pills mx-auto py-2">
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($items[$category['abbr']] as $subcategory => $item)
                                    @php
                                        $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
                                    @endphp
                                    <li class="nav-item bg-secondary">
                                        <button class="nav-link fw-light {{ $index == 0 ? 'active' : '' }}" 
                                            id="{{ $subcat }}-tab" 
                                            data-bs-toggle="pill" 
                                            data-bs-target="#{{ $subcat }}" 
                                            type="button" 
                                            role="tab" 
                                            aria-controls="{{ $subcat }}">
                                                {{ strtoupper(__('content.'.$subcategory)) }}
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
                        @foreach ($items[$category['abbr']] as $subcategory => $item)
                            @php
                                $subcat = preg_replace('/[^a-zA-Z]/', '', $subcategory);
                            @endphp
                            <div class="tab-content">
                                <div class="tab-pane fade {{ ($index == 0) ? 'active show' : '' }}" 
                                    id="{{ $subcat }}" 
                                    role="tabpanel" 
                                    aria-labelledby="{{ $subcat }}-tab">
                                        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 d-flex flex-wrap justify-content-center">
                                            @foreach ($item as $food)
                                                <div class="col mx-auto px-3 pb-4">
                                                    <div class="card bg-light" style="min-width: 229px;">
                                                        <div class="row g-0 h-100">
                                                            <div class="col-5 col-sm-12">
                                                                <img src="{{ $food['imgUrl'] }}" class="card-img-top">
                                                            </div>
                                                            <div class="col-7 col-sm-12 d-flex flex-column">
                                                                <div class="card-body flex-grow-1">
                                                                    <p class="card-title fw-bold">
                                                                        {{ App::getLocale() != 'en' ? $food['tname'] : $food['name'] }}
                                                                    </p>
                                                                </div>
                                                                <div class="card-footer text-muted text-end bg-light">
                                                                    @foreach ($food['price'] as $size => $price)
                                                                        {{ $size != '1' ? __('content.'.strtolower($size)) : "" }} {{ number_format($price) }}円  
                                                                        @if (count($food['price']) > 1)
                                                                            <br>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
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
    @endif
</div>
@endsection
