@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-12">
            <div class="box_general write_review">
                <form action="{{ route('companies.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>Create a Company </h1>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" maxlength="255" placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                        @error('slug')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" style="height: 180px;" maxlength="255" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input class="form-control" type="text" name="location" placeholder="City / Address" value="{{ old('location') }}">
                        @error('location')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="{{ old('category') }}">{{ (old('category') !== null) ? (App\Models\Category::find(old('category'))->name) : ('') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <select class="form-control" name="state" id="state">
                            <option value="{{ old('state') }}">{{ (old('state') !== null) ? (App\Models\State::find(old('state'))->name) : ('') }}</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input class="form-control" type="text" name="website_url" placeholder="Please include the http://" value="{{ old('website_url') }}">
                        @error('website_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email <small>(Public)</small></label>
                        <input class="form-control" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Contact Number <small>(Public)</small></label>
                        <input class="form-control" type="text" name="contact_number" placeholder="Contact number" value="{{ old('contact_number') }}">
                        @error('contact_number')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" type="text" name="facebook_url" placeholder="Please include the http://" value="{{ old('facebook_url') }}">
                        @error('facebook_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input class="form-control" type="text" name="twitter_url" placeholder="Please include the http://" value="{{ old('twitter_url') }}">
                        @error('twitter_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input class="form-control" type="text" name="insta_url" placeholder="Please include the http://" value="{{ old('insta_url') }}">
                        @error('insta_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo (300x300)</label>
                        <input class="form-control" type="file" name="company_logo" placeholder="Company Logo" value="">
                        @error('company_logo')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>

                    <x-terms-text></x-terms-text>

                    <div class="text-right add_bottom_30">
                        <button type="submit" class="btn_1">Create Company</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
@endsection
