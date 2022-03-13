@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-12">
            <div class="box_general write_review">
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    <h1>Update my Password </h1>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" value="">
                        @error('password')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" value="">
                        @error('password_confirmation')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_1">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
@endsection
