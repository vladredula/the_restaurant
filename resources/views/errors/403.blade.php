@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-11 p-3 text-center">
            <p class="h1">Restricted Access</p>
            <p>
				I don't think you are allowed to be in here.
			</p>

			<p>
				Perhaps you would like to go to <a href="{{{ URL::to('/') }}}">{{ __('content.home') }}</a>?
			</p>
        </div>
    </div>
</div>
@endsection