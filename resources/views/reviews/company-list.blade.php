@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >
            <div class="box_general write_review" >
                <form action="{{ route('companies.search') }}" method="POST">
                    @csrf
                    <div class="add_bottom_30"><h1>Search for a Company</h1></div>
                    <div class="form-group add_bottom_30" id="company_search_box">
                        <input class="typeahead form-control" type="text" placeholder="Company Name" name="company" id="company">
                        @error('company')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn_1">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>

<div class="container margin_60_35">
     <div class="row">
        {{-- <aside class="col-lg-3" id="sidebar">
            <div id="filters_col">
                <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                <div class="collapse show" id="collapseFilters">
                    <form action="{{ route('reviews.list',['search_criteria'=>$search_criteria,'filters_category' => $filters_category,'filters_rating' => $filters_rating]) }}">
                        @csrf

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
        <!-- /aside --> --}}


         <div class="col-lg-12">

             <div class="isotope-wrapper">
                 <div class="row">
                    @if($companies->count() == 0)
                    <div class="col-12 isotope-item latest">
                        <div class="review_listing">
                            <h4>No companies found</h4>
                        </div>
                    </div>
                    @else
                        @foreach($companies as $company)
                            @if($company !== null)
                                <div class="col-12 isotope-item latest">
                                    <div class="review_listing">
                                        {{-- <h5>{{ $company->name }}</h5> --}}
                                        <div class="clearfix add_bottom_15">
                                            <figure><img src="{{ ($company->image !== null) ? ($company->image) : (asset('img/company.png')) }}" alt=""></figure>
                                            @php  $stats = $company->get_review_stats() @endphp
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
                                            <small>{{ $company->category->name }}</small>
                                        </div>
                                        {{-- <h3><strong>{{ ($company->user !== null) ? $company->user->displayname : 'Deleted User'}}</strong> reviewed <a href="{{ route('companies.reviews',$company->slug)}}">{{ $company->name }}</a></h3> --}}
                                        <h4>{{ $company->name }}</h4>
                                        <p>{!! Illuminate\Support\Str::limit($company->description,200) !!}</p>
                                        <ul class="clearfix">
                                            <li><small>Added: {{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</small></li>
                                            <li><a href="{{ route('companies.reviews',$company->slug) }}" class="btn_1 small">Read Reviews</a></li>
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

                 <p class="text-center">{{ $companies->appends(['search_criteria' => $search_criteria])->onEachSide(0) }}</p>

         </div>
         <!-- /col -->
        </div>
 </div>
 <!-- /container -->
@endsection
