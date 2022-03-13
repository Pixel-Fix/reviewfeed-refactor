@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >
            <div class="box_general write_review" >
                <form action="{{ route('reviews.create.step1') }}" method="POST">
                    @csrf
                    <div class="add_bottom_30"><h1>Search for a Company</h1></div>
                    <div class="form-group add_bottom_30" id="company_search_box">
                        <input class="typeahead form-control" type="text" placeholder="Company Name" name="company" id="company">
                        @error('company')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn_1">Next</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>

<div class="bg_color_1">
    <div class="container margin_60">
        <div class="main_title_3">
            <h2>Latest Reviews</h2>
            <p></p>
            <a href="{{ route('reviews.list') }}">View All</a>
        </div>

        <div id="reccomended" class="owl-carousel owl-theme">

            @foreach($reviews as $review)
                @if($review->company !== null)
                    <div class="item">
                        <div class="review_listing">
                            <div class="clearfix">
                                <figure><img src="{{ ($review->user !== null) ? $review->user->profile_pic : (asset('img/user.png')) }}" alt=""></figure>
                                <span class="rating">
                                    @if($review->rating_id == 1)
                                        <i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                                    @elseif($review->rating_id == 2)
                                        <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                                    @elseif($review->rating_id == 3)
                                        <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                                    @elseif($review->rating_id == 4)
                                        <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i>
                                    @elseif($review->rating_id == 5)
                                        <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                                    @endif
                                    {{-- <em>4.50/5.00</em> --}}
                                </span>
                                <small>{{ $review->company->category->name }}</small>

                            </div>
                            <h3><strong>{{ ($review->user !== null) ? ($review->user->fullname()) : 'Deleted User' }}</strong> reviewed <a href="{{ route('companies.reviews',$review->company->slug) }}">{{ $review->company->name }}</a></h3>
                            <h4>"{{ $review->title }}"</h4>
                            <p>{{ Illuminate\Support\Str::limit($review->description,30) }}</p>
                            <ul class="clearfix">
                                <li><small>Published: {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small></li>
                                <li><a href="{{ route('reviews.detail',$review->slug) }}" class="btn_1 small">Read Review</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        <!-- /carousel -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >

        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>

@endsection
