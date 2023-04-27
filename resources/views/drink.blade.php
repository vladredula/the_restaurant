@extends('layouts.app')

@section('content')
<div class="container">
    <p class="display-4 text-center" style="font-weight: 800;">{{ __('content.drink_menu') }}</p>
    <p class="back-text text-center">{{ __('content.drink') }}</p>
</div>
<div class="container mt-5" style="max-width: 1140px;">
    @if(isset($error))
        <div class="alert alert-warning text-center">
            {{ $error }}
        </div>
    @else
        <ul class="nav nav-pills nav-fill bg-dark">
        @foreach ($categories as $id => $category)
            <li class="nav-item mx-auto">
                <button class="nav-link rounded-0 {{ $id == 0 ? 'active' : '' }}" 
                    id="{{ $category['abbr'] }}-tab" 
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
        <div id="drinkCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.tgifridays.co.jp/wp/wp-content/uploads/2013/07/slide-na1.jpg" class="w-100"/>		
                </div>
            </div>
        </div>
        <div class="tab-content">
            @foreach ($categories as $id => $category)
                <div class="tab-pane fade py-2 {{ $id == 0 ? 'active show' : '' }}" 
                    id="{{ $category['abbr'] }}" 
                    role="tabpanel" 
                    aria-labelledby="{{ $category['abbr'] }}-tab">
                        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-col-xl-3">
                            @php
                                $marker = 0;
                                $useFlex = count($items[$category['abbr']]) > 4 ? true : false;
                            @endphp
                            @foreach ($items[$category['abbr']] as $subCategory => $item)
                                @php
                                    $id = preg_replace('/[^a-zA-Z]/', '', $subCategory);
                                @endphp
                                @if ($useFlex && $marker % 2 == 0)
                                    <div class="col-sm-12">
                                        <div class="col d-flex flex-wrap">
                                @endif
                                <div class="col-12 py-2">
                                    <div class="d-grid">
                                        <button data-bs-target="#{{ $id }}" 
                                            data-bs-toggle="collapse" 
                                            class="btn btn-dark text-start">
                                                {{ strtoupper(__('content.'.$subCategory)) }}
                                        </button>
                                    </div>
                                    <ul class="list-group list-group-flush collapse show" id="{{ $id }}">
                                        @foreach ($item as $drink)
                                        <li class="list-group-item bg-light d-flex flex-column">
                                            <div>
                                                {{ App::getLocale() != 'en' ? $drink['tname'] : $drink['name'] }}
                                            </div>
                                            @if (count($drink['price']) > 1)
                                                <br>
                                            @endif
                                            <div class="text-muted text-end mt-auto">
                                            @foreach ($drink['price'] as $size => $price)  
                                                &nbsp;&nbsp;{{ $size != '1' ? __('content.'.$size) : "" }} {{ number_format($price) }}円
                                            @endforeach
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if ($useFlex && $marker % 2 != 0)
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $marker++;
                                @endphp
                            @endforeach
                            @if ($useFlex && $marker % 2 != 0)
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
