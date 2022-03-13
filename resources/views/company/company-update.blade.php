@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
            <div class="box_general write_review">
                <form action="{{ route('companies.update',$company->slug) }}" method="POST">
                    @csrf
                    <h1>Update my Company </h1>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" readonly name="name" placeholder="Name" value="{{ $company->name }}">
                        @error('name')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                        @error('slug')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description <small>(Public)</small></label>
                        <textarea class="form-control" style="height: 180px;" maxlength="255" name="description" placeholder="Description">{{ $company->description }}</textarea>
                        @error('description')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Location <small>(Public)</small></label>
                        <input class="form-control" type="text" name="location" placeholder="City / Address" value="{{ $company->location }}">
                        @error('location')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category <small>(Public)</small></label>
                        <select class="form-control" name="category" id="category">
                            <option value="{{ $company->category_id }}">{{ $company->category->name }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>State <small>(Public)</small></label>
                        <select class="form-control" name="state" id="state">
                            @if($company->state !== null)
                                <option value="{{ $company->state_id }}">{{ $company->state->name }}</option>
                            @else
                                <option value=""></option>
                            @endif
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Website <small>(Public)</small></label>
                        <input class="form-control" type="text" name="website_url" placeholder="Please include the http://" value="{{ $company->website_url }}">
                        @error('website_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email <small>(Public)</small></label>
                        <input class="form-control" type="text" name="email" placeholder="Email" value="{{ $company->email }}">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Contact Number <small>(Public)</small></label>
                        <input class="form-control" type="text" name="contact_number" placeholder="Contact number" value="{{ $company->contact_number }}">
                        @error('contact_number')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Facebook <small>(Public)</small></label>
                        <input class="form-control" type="text" name="facebook_url" placeholder="Please include the http://" value="{{ $company->facebook_url }}">
                        @error('facebook_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Twitter <small>(Public)</small></label>
                        <input class="form-control" type="text" name="twitter_url" placeholder="Please include the http://" value="{{ $company->twitter_url }}">
                        @error('twitter_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Instagram <small>(Public)</small></label>
                        <input class="form-control" type="text" name="insta_url" placeholder="Please include the http://" value="{{ $company->insta_url }}">
                        @error('insta_url')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>

                    <x-terms-text></x-terms-text>

                    <div class="text-right">
                        <button type="submit" class="btn_1">Update Company</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
        <div class="col-lg-4">
            <div class="box_general write_review text-center">
                <figure>
                    <img src="{{ $company->image }}" alt="">
                </figure>
                <form action="{{ route('companies.logo.update',$company->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Logo (300x300)</label>
                        <input class="form-control" type="file" name="company_logo" placeholder="Company Logo" value="">
                        @error('company_logo')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn_1">Upload Company Logo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
@endsection
