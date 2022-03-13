@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')

<section class="hero_single version_company">
    <div class="wrapper">
        <div class="container">
            <h3>Power your brand<br> with honest customer reviews</h3>
            <p>Let {{ config('app.name') }} help your business using customer reviews!</p>
        </div>
    </div>
</section>
<!-- /hero_single -->

<div class="bg_color_1">
    <div class="container margin_60_35">
        {{-- <div class="row">
            <div class="col-lg-4">
                <div class="box_feat">
                    <i class="pe-7s-speaker"></i>
                    <h3><strong>Thousands</strong> <em>of reviews every month</em></h3>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat">
                    <i class="pe-7s-flag"></i>
                    <h3><strong>Real</strong> <em>honest reviews every month</em></h3>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat">
                    <i class="pe-7s-rocket"></i>
                    <h3><strong>1</strong> thousand<em>have a great return</em></h3>
                    <p>Over 1 thousand companies increase their business</p>
                </div>
            </div>
        </div> --}}
        <!-- /row -->
        <div class="margin_60">
            <h4 class="add_bottom_30">Steps to claim and verify your company:</h4>
            <h5 class="add_bottom_30">Step 1: <a href="{{ route('register') }}">Register</a> an account using your company email address.</h5>
            <h5 class="add_bottom_30">Step 2: Send an email to {{ config('app.email') }} stating the company you wish to claim.</h5>
            <h5 class="add_bottom_30">Step 3: We will assess your account and the claimed company. If the information matches, we will assign the company to your account.</h5>
            <h5 class="add_bottom_30">Step 4: You will then be able to update the company information. <small>(Please note: the publicly visible email address needs to be verified). </small></h5>
            <h5 class="add_bottom_30">Step 5: Once the public information has been updated, we will verify the information and remove the notification on the company reviews screen.</h5>
        <!-- /carousel -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<x-company-join-button>

</x-company-join-button>

@endsection
