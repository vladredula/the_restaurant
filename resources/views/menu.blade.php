@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11 p-3" style="background-image:linear-gradient(to right, rgb(41, 67, 95, 1), rgb(41, 67, 95, 1), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),url('images/food.jpeg');background-size:cover;background-position-x:right;">
            <a class="text-decoration-none" href="{{ url('/food') }}">
                <h1 class="p-5 m-4 text-white">FOOD</h1>
            </a>
        </div>
        <div class="col-xxl-11 p-3 mt-4" style="background-image:linear-gradient(to right, rgb(41, 67, 95, 1), rgb(41, 67, 95, 1), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),url('images/drink.jpeg');background-size:cover;background-position-x:right;transform: scaleX(-1);">
            <a class="text-decoration-none" href="{{ url('/drink') }}">
                <h1 class="text-end p-5 m-4 text-white" style="transform: scaleX(-1)">DRINK</h1>
            </a>
        </div>
    </div>
</div>
@endsection
