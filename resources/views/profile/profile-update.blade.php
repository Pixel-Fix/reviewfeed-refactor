@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
            <div class="box_general write_review">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <h1>Update my Profile </h1>
                    <div class="form-group">
                        <label>Firstname</label>
                        <input class="form-control" type="text" name="firstname" placeholder="Firstname" value="{{ Auth::user()->firstname }}">
                        @error('firstname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input class="form-control" type="text" name="lastname" placeholder="Lastname" value="{{ Auth::user()->lastname }}">
                        @error('lastname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Displayname <small>(Public)</small></label>
                        <input class="form-control" type="text" name="displayname" placeholder="Displayname" value="{{ Auth::user()->displayname }}">
                        @error('displayname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_1">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
        <div class="col-lg-4">
            <div class="box_general write_review">
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection
