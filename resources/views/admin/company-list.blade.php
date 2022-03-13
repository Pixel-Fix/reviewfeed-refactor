@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >
            <div class="box_general write_review" >
                <form action="{{ route('admin.company.list') }}" method="POST">
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

         <div class="col-lg-12">

             <div class="isotope-wrapper">
                 <div class="row">
                    @if($emailsend == 'success')
                        <div class="col-12 isotope-item latest">
                            <div class="clearfix add_bottom_15 text-center">
                                <h6 class="text-success">Please check your inbox for the verification email.</h6>
                            </div>
                        </div>
                    @elseif($emailverified == 'success')
                        <div class="col-12 isotope-item latest">
                            <div class="clearfix add_bottom_15 text-center">
                                <h6 class="text-success">Your company email was successfully verified.</h6>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 isotope-item latest">
                        <div class="clearfix add_bottom_15 text-right">
                            <a class="btn_1 " href="{{ route('companies.create') }}">Create Company</a>
                        </div>
                    </div>
                    @if($companies->count() == 0)
                    <div class="col-12 isotope-item latest">
                        <div class="review_listing">
                            <h4>No companies found</h4>
                        </div>
                    </div>
                    @else
                        @foreach($companies as $company)
                            <div class="col-12 isotope-item latest">
                                <div class="review_listing">
                                    @if($company->active === false)
                                        <div class="clearfix add_bottom_15 text-center">
                                            <h6 class="text-warning">(Pending {{ config('app.name')}} verification)</h6>
                                        </div>
                                    @endif
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
                                    {{-- <h3><strong>A</strong> reviewed <a href="a">{{ $company->name  }}</a></h3> --}}
                                    <h4> {{ $company->name }} </h4>
                                    <p>{!! Illuminate\Support\Str::limit($company->description,200) !!}</p>
                                    @if($company->email_verified_at === null)
                                        <h6 class="text-danger">Email Verified: <a href="{{ route('admin.company.verify-email',$company->slug) }}">NOT VERIFIED</a> </h6>
                                    @else
                                        <h6 class="text-success">Email Verified: {{ $company->email_verified_at }} </h6>
                                    @endif
                                    @if($company->user !== null)
                                        <h6 class="text-success">User: {{ $company->user->fullname() }} </h6>
                                    @else
                                        <h6 class="text-danger">User: <a href="{{ route('admin.company.assign',$company->slug) }}">NOT ASSIGNED</a></h6>
                                    @endif
                                    <ul class="clearfix">
                                        {{-- <li><small>Published: {{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</small></li> --}}
                                        <li>
                                            <a href="{{ route('companies.reviews',$company->slug) }}" class="btn_1 small">Company Reviews</a>
                                            {{-- <a href="{{ route('companies.update',$company->slug) }}" class="btn_1 small">Update Company Details</a> --}}
                                            @if(($company->email_verified_at !== null) && ($company->user_id !== null))
                                                <a href="{{ route('admin.company.verify',$company->slug) }}" class="btn_1 company small">Verify Company</a>
                                            @endif
                                        </li>

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

                 <p class="text-center">{{ $companies->appends(['search_criteria' => $search_criteria])->onEachSide(0) }}</p>

         </div>
         <!-- /col -->

    </div>
 </div>
 <!-- /container -->
@endsection
