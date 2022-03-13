<!DOCTYPE html>
<html lang="en">

@include('partials._headers')

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=2793309884281115" nonce="sR4jhDq3"></script>
	<div id="page" class="theia-exception">

        <header class="header_in is_fixed menu_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div id="logo">

                            <x-logo></x-logo>

                        </div>
                    </div>
                    <div class="col-lg-9 col-12">

                        @include('partials._navbar')

                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->

        </header>
        <!-- /header -->

        <main class="margin_main_container">
            @yield('page-search')

            @yield('content')
        </main>
        <!-- /main -->

        @include('partials._footer')

	</div>
    <!-- page -->

	<x-modal-login>

    </x-modal-login>

	<div id="toTop"></div><!-- Back to top button -->

	@include('partials._scripts')

</body>
</html>
