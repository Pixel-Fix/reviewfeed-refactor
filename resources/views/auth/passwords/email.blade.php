@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="access_social">

        <x-social-login-links></x-social-login-links>

    </div>
    <div class="divider"><span>Or</span></div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        <i class="icon_mail_alt"></i>
        @if (session('status'))
            <div class="alert alert-success add_top_10" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @error('email')
            <span class="text-danger"><small>{{ $message }}</small></span>
        @enderror
    </div>
    <button type="submit" class="btn_1 rounded full-width">{{ __('Send Password Reset Link') }}</button>
    <div class="text-center add_top_10">New to {{ config('app.name') }} <strong><a href="{{ route('register') }}">Sign up!</a></strong></div>
    <div class="add_top_30 text-center"><a href="{{ route('home') }}" class="btn_1 rounded full-width">Home</a></div>
</form>
@endsection
