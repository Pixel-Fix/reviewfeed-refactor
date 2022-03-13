@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >
            <div class="box_general write_review" >
                <h6 class="add_bottom_30 text-success text-center">{{ $assignMessage ?? '' }}</h6>
                <form action="{{ route('admin.company.assign',$company->slug) }}" method="POST">
                    @csrf
                    <h1>Search for a User</h1>
                    <h4 class="add_bottom_30">Company Name: {{ $company->name }}</h4>
                    <div class="form-group add_bottom_30" id="company_search_box">
                        <input class="form-control" type="text" placeholder="Email Address" name="email" id="email">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn_1">Assign</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>

@endsection
