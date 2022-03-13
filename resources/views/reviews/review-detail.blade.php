@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
{{-- <div class="reviews_summary">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <figure>
                        <img src="{{ asset('img/logo-company.png') }}" alt="">
                    </figure>
                    <small>Shop</small>
                    <h1>{{ $company->name }}</h1>
                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00 - based on 234 reviews</em></span>
                </div>
                <div class="col-lg-4 review_detail">
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>5 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>4 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>3 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>2 stars</strong></div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-lg-9 col-9">
                            <div class="progress last">
                                <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-3 text-right"><strong>1 stars</strong></div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /reviews_summary --> --}}

<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
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
                        <x-social-share-links></x-social-share-links>
                        {{-- <ul>
                            <li>

                            </li>
                            <li>

                            </li>
                        </ul> --}}
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
            @auth
                @if(($review->company->user_id == Auth::id()) || ($review->user_id == Auth::id()))
                    <div class="box_general write_review">
                        <form action="{{ route('reviews.reply',$review->slug) }}" method="POST">
                            @csrf
                            <div class="add_bottom_30"><h3>Reply to this review</h3></div>
                            <div class="form-group">
                                <textarea class="form-control" style="height: 180px;" name="description" placeholder="Write your reply to help others learn about your business">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn_1">Reply</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endauth
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
