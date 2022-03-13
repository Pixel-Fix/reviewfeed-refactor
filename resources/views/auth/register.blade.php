@extends('layouts.auth')

@section('content')
<form autocomplete="off" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="access_social">

        <x-social-login-links></x-social-login-links>

    </div>
    <div class="divider"><span>Or</span></div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}">
        <i class="ti-user"></i>
        @error('firstname')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}">
        <i class="ti-user"></i>
        @error('lastname')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Displayname" name="displayname" value="{{ old('displayname') }}">
        <i class="ti-user"></i>
        @error('displayname')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
        <i class="icon_mail_alt"></i>
        @error('email')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="password" id="password1" name="password" placeholder="Password" value="{{ old('password') }}">
        <i class="icon_lock_alt"></i>
        @error('password')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control" type="password" id="password2" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
        <i class="icon_lock_alt"></i>
        @error('password_confirmation')
            <div class="text-danger"><small>{{ $message }}</small></div>
        @enderror
    </div>

    <x-terms-text></x-terms-text>

    <div id="pass-info" class="clearfix"></div>
    <button type="submit" class="btn_1 rounded full-width">Register now!</button>
    <div class="text-center add_top_10">Already have an acccount? <strong><a href="{{ route('login') }}">Sign in</a></strong></div>
    <div class="add_top_30 text-center"><a href="{{ route('home') }}" class="btn_1 rounded full-width">Home</a></div>
</form>
@endsection
