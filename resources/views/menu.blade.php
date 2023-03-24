@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-2 pb-2">
        <p>MENU</p>
    </div>
    <div class="row justify-content-center">
        <a href="{{ url('/food') }}" class="col-md-11 col-lg-10 col-xl-9 col-xxl-8 mb-3 p-3 rounded-end text-decoration-none" style="background-image:linear-gradient(to right, red, red, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),url('images/food.jpeg');background-size:cover;">
            <p class="h1 p-5 m-5 text-white">FOOD</p>
        </a>
        <a href="{{ url('/drink') }}" class="col-md-11 col-lg-10 col-xl-9 col-xxl-8 mt-3 p-3 rounded-end text-decoration-none" style="background-image:linear-gradient(to right, red, red, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),url('images/drink.jpeg');background-size:cover;transform: scaleX(-1);">
            <p class="text-end h1 p-5 m-5 text-white" style="transform: scaleX(-1)">DRINK</p>
        </a>
    </div>
</div>
@endsection
