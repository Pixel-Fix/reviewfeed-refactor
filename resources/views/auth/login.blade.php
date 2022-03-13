@extends('layouts.auth')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="access_social">

        <x-social-login-links></x-social-login-links>

    </div>
    <div class="divider"><span>Or</span></div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <i class="icon_mail_alt"></i>
        @error('email')
            <span class="text-danger"><small>{{ $message }}</small></span>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
        <i class="icon_lock_alt"></i>
        @error('password')
            <span class="text-danger"><small>{{ $message }}</small></span>
        @enderror
    </div>
    <div class="clearfix add_bottom_30">
        <div class="checkboxes float-left">
            <label class="container_check">Remember me
              <input type="checkbox">
              <span class="checkmark"></span>
            </label>
        </div>
        <div class="float-right mt-1"><a id="forgot" href="{{ route('password.request') }}">Forgot Password?</a></div>
    </div>
    <button type="submit" class="btn_1 rounded full-width">Login to {{ config('app.name') }}</button>
    <div class="text-center add_top_10">New to {{ config('app.name') }} <strong><a href="{{ route('register') }}">Sign up!</a></strong></div>
    <div class="add_top_30 text-center"><a href="{{ route('home') }}" class="btn_1 rounded full-width">Home</a></div>
</form>
@endsection
