@extends('layouts.app')

@section('page-search')

    {{-- @include('partials._page-search') --}}

@endsection

@section('content')
<div class="container margin_60_35">
     <div class="row">
         <div class="col-lg-12 box_general">
            <div class="text-left">
                {{ config('app.name') }} Website Disclaimer
                <br><br>
                1) If you continue to browse and use this public forum you are agreeing to comply with and be bound by the following disclaimer, together with our privacy policy.
                <br><br>
                2) All information contained on {{ config('app.name') }} is user generated content, opinions, and views. This does not necessarily reflect the opinion and views of {{ config('app.name') }} and any disputes arising from, in relation to or in connection with, the site are to be governed by the laws of the State of Queensland.
                <br><br>
                3) The information contained in this website is for general information purposes only and is provided by its users. {{ config('app.name') }} does not endeavour to keep the information up to date or correct, make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.
                <br><br>
                4) You need to make your own enquiries to determine if the information or products are appropriate for your intended use. In no event will {{ config('app.name') }}  be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.
                <br><br>
                5) {{ config('app.name') }} reserves the right, in its sole discretion, to move, remove, or alter any user generated information. {{ config('app.name') }} is under no obligation whatsoever to update or correct any information if the inaccuracy becomes apparent at any stage.
                <br><br>
                6) Through this website you may be able to link to other websites which are not under the control of {{ config('app.name') }}. {{ config('app.name') }} have no control over the nature, content and availability of those websites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
            </div>
         </div>
         <!-- /col -->
     </div>
 </div>
 <!-- /container -->
@endsection
