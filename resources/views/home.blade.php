@extends('layouts.app')

@section('page-search')
<section class="hero_single version_1">
    <div class="wrapper">
        <div class="container">
            <h3>Every Review is a building block!</h3>
            <p>Check Business Ratings &amp; Read Reviews</p>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                <form method="POST" action="{{ route('reviews.list') }}">
                    @csrf
                    <div class="row no-gutters custom-search-input-2">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="search_criteria" placeholder="Search Company Reviews...">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            @php $states = App\Models\State::orderBy('name','asc')->get() @endphp
                            <select class="wide" name="state" id="state">
                                <option value="all">All States</option>
                                @foreach($states as $state)
                                    <option >{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /hero_single -->
@endsection

@section('content')
<div class="container margin_60_35">
    <div class="main_title_3">
            <h2>Categories</h2>
            <p></p>
            {{-- <a href="all-categories.html">View all</a> --}}
        </div>
    <div class="row justify-content-center">

        @include('partials._home-top-categories')

    </div>
    <!-- /row -->
</div>
<!-- /container -->

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

<div class="call_section_3">
    <div class="wrapper">
        <div class="container clearfix">
            <div class="col-lg-5 col-md-7 float-right">
                <h3>Let's Help Each Other</h3>
                <p>Every review is a business building block. ReviewFeed is a review platform open to everyone in Australia where you can share your experiences to create these building blocks and help others make more informed decisions.</p>
                <p><a class="btn_1 add_top_10 wow bounceIn" href="{{ route('login') }}" data-wow-delay="0.5s">Join {{ config('app.name') }} Now!</a></p>
            </div>
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /call_section -->
@endsection
