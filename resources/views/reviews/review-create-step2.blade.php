@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">
            <div class="box_general write_review">
                <form action="{{ route('reviews.create.step2',[$company->slug]) }}" method="POST">
                    @csrf
                    <h1>Write a review of {{ $company->name }}</h1>
                    <div class="rating_submit">
                        <div class="form-group">
                            <label class="d-block">Overall Rating</label>
                            <span class="rating">
                                <input type="radio" checked class="rating-input" id="5_star" name="rating" value="5"><label for="5_star" class="rating-star"></label>
                                <input type="radio" class="rating-input" id="4_star" name="rating" value="4"><label for="4_star" class="rating-star"></label>
                                <input type="radio" class="rating-input" id="3_star" name="rating" value="3"><label for="3_star" class="rating-star"></label>
                                <input type="radio" class="rating-input" id="2_star" name="rating" value="2"><label for="2_star" class="rating-star"></label>
                                <input type="radio" class="rating-input" id="1_star" name="rating" value="1"><label for="1_star" class="rating-star"></label>
                            </span>

                            @error('rating')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <!-- /rating_submit -->
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
                        <label>Location</label>
                        <input class="form-control" type="text" name="location" placeholder="Where is this business located?" value="{{ old('location') }}">
                        @error('location')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title of your review</label>
                        <input class="form-control" type="text" name="title" placeholder="If you could say it in one sentence, what would you say?" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Your review</label>
                        <textarea class="form-control" style="height: 180px;" name="description" placeholder="Write your review to help others learn about this business">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>

                    <x-terms-text></x-terms-text>

                    <div class="form-group text-right">
                        <button type="submit" class="btn_1">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
        <div class="col-lg-4">
            <div class="latest_review">
                <h4>Recent reviews<br>for {{ $company->name }}</h4>
                @if(count($reviews) == 0)
                    <div class="review_listing">
                        <h4>No recent reviews</h4>
                    </div>
                @else
                    @foreach($reviews as $review)
                        <div class="review_listing">
                            <div class="clearfix add_bottom_10">
                                <figure><img src="{{ ($review->user !== null) ? ($review->user->profile_pic) : (asset('img/user.png')) }}" alt=""></figure>
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
                                <small>{{ ($review->company !== null) ? $review->company->category->name  : ''}}</small>
                            </div>
                            <h3><strong>{{ ($review->user !== null) ? $review->user->displayname : 'Deleted User'}}</strong></h3>
                            <h4>{{ $review->title }}</h4>
                            <p>{{ Str::limit($review->description, 30) }}</p>
                            <ul class="clearfix">
                                <li><small>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small></li>
                                <li><a href="{{ route('reviews.detail',$review->slug) }}" class="btn_1 small">Read Review</a></li>
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- /latest_review -->

        </div>
    </div>
    <!-- /row -->
</div>

@endsection
