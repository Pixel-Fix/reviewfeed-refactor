@extends('layouts.app')

@section('page-search')

    @include('partials._page-search')

@endsection

@section('content')
<div class="container margin_60_35">
     <div class="row">
        <aside class="col-lg-3" id="sidebar">
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                <div class="collapse show" id="collapseFilters">
                    <form action="{{ route('reviews.list',['search_criteria'=>$search_criteria,'filters_category' => $filters_category,'filters_rating' => $filters_rating]) }}">
                        @csrf
                        {{-- <div class="filter_type date_filter">
                            <h6>Date</h6>
                            <ul>
                                <li>
                                    <a data-action="filters" href="{{ route('reviews.list',['search_criteria' => $search_criteria,'filters_listing' => 'latest','filters_category' => $filters_category,'filters_rating' => $filters_rating]) }}">
                                        <label class="container_radio">Latest
                                            <input type="radio" id="" name="filters_listing" value="latest" {{ ($filters_listing == 'latest') ? ('checked class="selected"') : ('') }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                                <li>
                                    <a data-action="filters" href="{{ route('reviews.list',['search_criteria' => $search_criteria,'filters_listing' => 'oldest','filters_category' => $filters_category,'filters_rating' => $filters_rating]) }}">
                                        <label class="container_radio">Oldest
                                            <input type="radio" id="" name="filters_listing" value="oldest" {{ ($filters_listing == 'oldest') ? ('checked class="selected"') : ('') }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="filter_type">
                            <h6>Ratings <small>(Total Reviews)</small></h6>
                            <ul>
                                @foreach($ratings as $rating)
                                <li>
                                    <a data-action="filters" href="{{ route('reviews.list',['search_criteria' => $search_criteria,'filters_category' => $filters_category,'filters_rating' => $rating->id ]) }}">
                                        <label class="container_radio">{{ $rating->id }}{{ ($rating->id == 1) ? "+ star" : "+ stars" }}<small>{{ $rating->reviews->count() }}</small>
                                            <input type="radio" name="filters_rating" value="{{ $rating->id }}" {{ ($filters_rating == $rating->id ) ? ('checked') : ('') }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="filter_type">
                            <h6>Category <small>(Total Reviews)</small></h6>
                            <ul>
                                <li>
                                    <a data-action="filters" href="{{ route('reviews.list',['search_criteria' => $search_criteria,'filters_category' => 'all','filters_rating' => $filters_rating]) }}">
                                        <label class="container_radio">All
                                            <input type="radio" name="filters_category" value="all" {{ ($filters_category == 'all' ) ? ('checked') : ('') }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                <li>
                                    <a data-action="filters" href="{{ route('reviews.list',['search_criteria' => $search_criteria,'filters_category' => $category->id,'filters_rating' => $filters_rating]) }}">
                                        <label class="container_radio">{{ $category->name }} <small>{{ $category->total_reviews($category->id) }}</small>
                                            <input type="radio" name="filters_category" value="{{ $category->id }}" {{ ($filters_category == $category->id ) ? ('checked class="selected"') : ('') }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </form>
                </div>
                <!--/collapse -->
            </div>
            <!--/filters col-->
        </aside>
        <!-- /aside -->


         <div class="col-lg-9">

             <div class="isotope-wrapper">
                 <div class="row">
                    @if($reviews->count() == 0)
                    <div class="col-12 isotope-item latest">
                        <div class="review_listing">
                            <h4>No recent reviews</h4>
                        </div>
                    </div>
                    @else
                        @foreach($reviews as $review)
                            @if($review->company !== null)
                                <div class="col-12 isotope-item latest">
                                    <div class="review_listing">
                                        <div class="clearfix add_bottom_15">
                                            <figure><img src="{{ ($review->user !== null) ? ($review->user->profile_pic) : (asset('img/user.png')) }}" alt=""></figure>
                                            {{-- @php  $stats = $review->company->get_review_stats() @endphp --}}
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
                                                {{-- <em>{{ $stats["ave"] }}/5.00</em> --}}
                                            </span>
                                            <small>{{ $review->category->name }}</small>
                                        </div>
                                        <h3><strong>{{ ($review->user !== null) ? $review->user->displayname : 'Deleted User'}}</strong> reviewed <a href="{{ route('companies.reviews',$review->company->slug)}}">{{ $review->company->name }}</a></h3>
                                        <h4>"{{ $review->title }}"</h4>
                                        <p>{!! Illuminate\Support\Str::limit($review->description,200) !!}</p>
                                        <ul class="clearfix">
                                            <li><small>Published: {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small></li>
                                            <li><a href="{{ route('reviews.detail',$review->slug) }}" class="btn_1 small">Read Review</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <!-- /review_listing grid -->
                            @endif
                        @endforeach
                    @endif
                 </div>
                 <!-- /row -->
                 </div>
                 <!-- /isotope-wrapper -->

                 <p class="text-center">{{ $reviews->appends(['search_criteria' => $search_criteria])->onEachSide(0) }}</p>

         </div>
         <!-- /col -->









        </div>
 </div>
 <!-- /container -->
@endsection
