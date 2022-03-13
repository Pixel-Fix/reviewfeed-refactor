@extends('layouts.app')

@section('page-search')

<div class="container margin_60_35 add_top_30">
    <div class="row">
        <div class="col-lg-12" >
            <div class="box_general write_review" >
                <form action="{{ route('admin.user.list') }}" method="POST">
                    @csrf
                    <div class="add_bottom_30"><h1>Search for a User</h1></div>
                    <div class="form-group add_bottom_30" id="company_search_box">
                        <input class="typeahead form-control" type="text" placeholder="Email" name="search_criteria" id="search_criteria">
                        @error('search_criteria')
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

@endsection

@section('content')

<div class="container margin_60_35">
     <div class="row">

         <div class="col-lg-12">

             <div class="isotope-wrapper">
                 <div class="row">
                    {{-- @if($emailsend == 'success')
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
                    @endif --}}

                    <div class="col-12 isotope-item latest">
                        <div class="clearfix add_bottom_15 text-right">
                            <a class="btn_1 " href="{{ route('companies.create') }}">Create Company</a>
                        </div>
                    </div>
                    @if($users->count() == 0)
                    <div class="col-12 isotope-item latest">
                        <div class="review_listing">
                            <h4>No users found</h4>
                        </div>
                    </div>
                    @else
                        @foreach($users as $user)
                            <div class="col-12 isotope-item latest">
                                <div class="company_listing isotope-item high">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="">
                                                <h3>{{ $user->fullname() }}</h3>
                                                <a href="{{ route('admin.user.view',$user->id) }}" class="btn btn-sm btn-primary">View User Details</a>
                                                @if($user->is_active === true)
                                                    <a href="{{ route('admin.user.block',$user->id) }}" class="btn btn-sm btn-danger">Block User</a>
                                                @elseif($user->is_active === false)
                                                    <a href="{{ route('admin.user.unblock',$user->id) }}" class="btn btn-sm btn-info">Unblock User</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /review_listing grid -->
                        @endforeach
                    @endif
                 </div>
                 <!-- /row -->
                 </div>
                 <!-- /isotope-wrapper -->

                 <p class="text-center">{{ $users->appends(['search_criteria' => $search_criteria])->onEachSide(0) }}</p>

         </div>
         <!-- /col -->

    </div>
 </div>
 <!-- /container -->
@endsection
