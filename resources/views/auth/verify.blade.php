@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('message.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('message.verify_link_sent') }}
                        </div>
                    @endif

                    {{ __('message.check_email') }}
                    {{ __('message.if_email_not_received') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('message.click_here') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
