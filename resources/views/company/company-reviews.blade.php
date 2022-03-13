@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="reviews_summary">
    <div class="wrapper">
        <div class="container">
            @if($company->active === false)
                <div class="alert alert-warning" role="alert">
                    This company has not been claimed and is unverified. Please contact us if you wish to claim and verify this company. <a href="{{ route('companies.stepstoverify') }}">Steps to claim and verify your company</a>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8">
                    <figure>
                        <img src="{{ $company->image }}" alt="">
                    </figure>
                    <small>{{ $company->category->name }}</small>
                    <h1>{{ $company->name }}</h1>
                    <span class="rating">
                        @if($stats["floor"] == 0)
                            <i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                        @elseif($stats["floor"] == 1)
                            <i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                        @elseif($stats["floor"] == 2)
                            <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                        @elseif($stats["floor"] == 3)
                            <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><i class="icon_star empty"></i>
                        @elseif($stats["floor"] == 4)
                            <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i>
                        @elseif($stats["floor"] == 5)
                            <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i>
                        @endif
                        <em>{{ $stats["ave"] }}/5.00</em>
                    </span>
                </div>
                <div class="col-lg-4 review_detail">
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($stats["5"] != 0) ? ((($stats["5"])/$stats["total"])*100) : '0' }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>5 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($stats["4"] != 0) ? ((($stats["4"])/$stats["total"])*100) : '0' }}%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>4 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($stats["3"] != 0) ? ((($stats["3"])/$stats["total"])*100) : '0' }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>3 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($stats["2"] != 0) ? ((($stats["2"])/$stats["total"])*100) : '0' }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>2 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress last">
                                <div class="progress-bar" role="progressbar" style="width: {{ ($stats["1"] != 0) ? ((($stats["1"])/$stats["total"])*100) : '0' }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>1 star</strong></div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 add_top_30 text-center">
                    <a href="{{ route('reviews.create.step2',$company->slug) }}" class="btn_1">Write a Review</a>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /reviews_summary -->

<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
            @if($reviews->count() == 0)
                <div class="review_listing">
                    <h4>No recent reviews</h4>
                </div>
            @else
                @foreach($reviews as $review)
                    <div class="review_card">
                        <div class="row">
                            <div class="col-md-2 user_info text-center">
                                <figure><img src="{{ ($review->user !== null) ? ($review->user->profile_pic) : (asset('img/user.png')) }}" alt=""></figure>
                                <h5>{{ ($review->user !== null) ? $review->user->displayname : 'Deleted User' }}</h5>
                            </div>
                            <div class="col-md-10 review_content">
                                <div class="clearfix add_bottom_15">
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
                                    <em>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</em>
                                </div>
                                <h4>"{{ $review->title }}"</h4>
                                <p>{!! $review->description !!}</p>

                                <ul>
                                    <li><a href="{{ route('reviews.detail',$review->slug) }}" class="btn_2 small">Read Review</a></li>
                                </ul>
                                <x-social-share-links></x-social-share-links>
                            </div>
                        </div>
                        <!-- /row -->
                        @foreach($review->replies as $reply)
                        <div class="row reply">
                            <div class="col-md-2 user_info text-center">
                                <figure><img src="{{ ($reply->user !== null) ? ($reply->user->profile_pic) : (asset('img/user.png')) }}" alt=""></figure>
                            </div>
                            <div class="col-md-10">
                                <div class="review_content">
                                    <strong>Reply from {{ ($reply->user !== null) ? $reply->user->displayname : 'Deleted User' }}</strong>
                                    <em>{{ Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</em>
                                    <p>{!! $reply->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /reply -->
                        @endforeach
                    </div>
                @endforeach
            @endif
            <!-- /review_card -->
            <br>
                {{ $reviews->onEachSide(0)->links() }}
            <br>

            <!-- /pagination -->
        </div>
        <!-- /col -->
        <div class="col-lg-4">

            @include('partials._companyinfo')

        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection
