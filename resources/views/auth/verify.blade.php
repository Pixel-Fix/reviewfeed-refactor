@extends('layouts.auth')

@section('content')
<div class="access_social">

    <x-social-login-links></x-social-login-links>

</div>
<div class="divider"><span>Or</span></div>
<div class="clearfix add_bottom_30 add_top_30">
    <h3>{{ __('Verify Your Email Address') }}</h3>
</div>
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif

{{ __('Before proceeding, please check your email for a verification link.') }}
{{ __('If you did not receive the email') }}
<div class="add_bottom_30">
    <div class="divider"><span>Or</span></div>
</div>
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn_1 rounded full-width">{{ __('click here to request another') }}</button>.
</form>
@endsection
