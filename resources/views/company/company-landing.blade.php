@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<section class="hero_single version_company">
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h3>Power your brand<br> with honest customer reviews</h3>
                <p>Let {{ config('app.name') }} help your business using customer reviews!</p>
            </div>
            <div class="col-lg-12 text-right">
                <form action="{{ route('companies.search') }}" method="POST">
                    @csrf
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" class="search-query" placeholder="Search Companies..." name="company" >
                            <input type="submit" class="btn_search" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /hero_single -->

<x-company-join-button>

</x-company-join-button>

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
            <h5 class="text-center add_bottom_30">More than {{ $company_count->count }} businesses use {{ config('app.name') }}!</h5>
            <div id="brands" class="owl-carousel owl-theme">
            <!-- /item -->
            @foreach($companies as $company)
                <div class="item">
                    <a href="{{ route('companies.reviews',$company->slug) }}"><img src="{{ $company->image }}" alt=""></a>
                </div>
            @endforeach
        </div>
        <!-- /carousel -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<div class="feat_blocks">
<div class="container-fluid h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-6 p-0">
              <div class="block_1"><img src="{{ asset('img/company_info_graphic_1.svg') }}" alt="" class="img-fluid"></div>
    </div>
    <div class="col-md-6 p-0">
        <div class="block_2">
            <h3>Increase your conversions with the power of real and honest customer reviews.</h3>
            <p>Reviews and ratings build trust amongst your customers and in turn help increase your conversion rates and sales. Feedback can help you improve your products, services and could even help with better organic search results and SEO.</p>

            <a class="btn_1 medium" href="{{ route('companies.create') }}">Join Now!</a>

        </div>
    </div>

  </div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /feat_blocks -->

<div class="bg_color_1">
    <div class="container margin_60_35">
        <div class="main_title_2">
        <h2>Benefits</h2>
        {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box_feat_2">
                    <h3><i class="pe-7s-graph3"></i>Free Advertising</h3>
                    <p>Every review is a form of free advertising for your business, increasing your business awareness.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box_feat_2">
                    <h3><i class="pe-7s-share"></i>Social Integration</h3>
                    <p>Share your business and review details directly to various social media platforms, increasing your audience.</p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-6">
                <div class="box_feat_2">
                    <h3><i class="pe-7s-target"></i>Improved SEO</h3>
                    <p>Customer reviews can improve your business and website credibility thus making for improved SEO.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box_feat_2">
                    <h3><i class="pe-7s-help2"></i>Feedback</h3>
                    <p>Constructive criticism and suggestions can help you improve your products and services.</p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-6">
                <div class="box_feat_2">
                    <h3><i class="pe-7s-users"></i>Real Reviews</h3>
                    <p>We pride ourselves in providing an honest review system and we do our best to make sure all reviews are legit and from real customers.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- /container -->
</div>
<!-- /bg_color_1 -->

<x-company-join-button>

</x-company-join-button>

@endsection
