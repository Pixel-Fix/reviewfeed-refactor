@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
     <div class="row">
         {{-- <aside class="col-lg-3" id="sidebar">
             <div id="filters_col">
                 <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                 <div class="collapse show" id="collapseFilters">
                     <div class="filter_type date_filter">
                         <h6>Date</h6>
                         <ul>
                             <li>
                                 <label class="container_radio">All
                                     <input type="radio" id="all_2" name="filters_listing" value="all" checked data-filter="*" class="selected">
                                     <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_radio">Latest
                         <input type="radio" id="latest" name="filters_listing" value="latest" data-filter=".latest">
                         <span class="checkmark"></span>
                     </label>
                             </li>
                             <li>
                                 <label class="container_radio">Oldest
                         <input type="radio" id="oldest" name="filters_listing" value="oldest" data-filter=".oldest">
                         <span class="checkmark"></span>
                     </label>
                             </li>

                         </ul>
                     </div>
                     <div class="filter_type">
                         <h6>Category</h6>
                         <ul>
                             <li>
                                 <label class="container_check">Restaurants <small>43</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Shops <small>33</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Bars <small>12</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Events <small>44</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                         </ul>
                     </div>
                     <div class="filter_type">
                         <h6>Rating</h6>
                         <ul>
                             <li>
                                 <label class="container_check">Superb 9+ <small>34</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Very Good 8+ <small>21</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Good 7+ <small>15</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                             <li>
                                 <label class="container_check">Pleasant 6+ <small>34</small>
                                   <input type="checkbox">
                                   <span class="checkmark"></span>
                                 </label>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <!--/collapse -->
             </div>
             <!--/filters col-->
         </aside>
         <!-- /aside --> --}}

         <div class="col-lg-12">

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
                                            {{-- <em>4.50/5.00</em> --}}
                                        </span>
                                        <small>{{ ($review->company !== null) ? $review->company->category->name  : ''}}</small>
                                    </div>
                                    <h3 ><strong>{{ $review->user->displayname }}</strong> reviewed <a href="{{ route('companies.reviews',$review->company->slug)}}">{{ $review->company->name }}</a></h3>
                                    <h4>"{{ $review->title }}"</h4>
                                    <p>{!! Illuminate\Support\Str::limit($review->description,200) !!}</p>
                                    <ul class="clearfix">
                                        <li><small>Published: {{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small></li>
                                        <li><a href="{{ route('reviews.detail',$review->slug) }}" class="btn_1 small">Read review</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /review_listing grid -->
                        @endforeach
                    @endif
                 </div>
                 <!-- /row -->
                 </div>
                 <!-- /isotope-wrapper -->

                 <p class="text-center">{{ $reviews->onEachSide(0) }}</p>

         </div>
         <!-- /col -->
     </div>
 </div>
 <!-- /container -->
@endsection
