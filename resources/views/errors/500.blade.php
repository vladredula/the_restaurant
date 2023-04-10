@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11 p-3 text-center">
            <p class="h1">The Restaurant is close</p>
            <p>
				The chef seems to be away for now. We're really sorry
				about that.
			</p>

			<p>
				Perhaps you would like to go to <a href="{{{ URL::to('/') }}}">{{ __('content.home') }}</a>?
			</p>
        </div>
    </div>
</div>
@endsection