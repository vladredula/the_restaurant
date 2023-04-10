@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11 p-3 text-center">
            <p class="h1">Menu not found</p>
            <p>
				We couldn't find the menu you requested. We're really sorry
				about that.
			</p>

			<p>
				Perhaps you would like to go to <a href="{{{ URL::to('/') }}}">{{ __('content.home') }}</a>?
			</p>
        </div>
    </div>
</div>
@endsection