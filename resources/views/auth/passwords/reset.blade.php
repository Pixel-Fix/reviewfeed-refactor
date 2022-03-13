@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="access_social">

        <x-social-login-links></x-social-login-links>

    </div>
    <div class="divider"><span>Or</span></div>
    <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        <i class="icon_mail_alt"></i>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        <i class="icon_lock_alt"></i>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group ">
        <input id="password-confirm" type="password" pla class="form-control" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
        <i class="icon_lock_alt"></i>
    </div>
    <div class="form-group">
        <button type="submit" class="btn_1 rounded full-width">{{ __('Reset Password') }}</button>
    </div>
    <div class="divider"><span>Or</span></div>
    <div class="add_top_30 text-center"><a href="{{ route('home') }}" class="btn_1 rounded full-width">Home</a></div>
</form>
@endsection
