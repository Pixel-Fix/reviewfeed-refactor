<!DOCTYPE html>
<html lang="en">

@include('partials._headers')

<body id="login_bg">

	<nav id="menu" class="fake_menu"></nav>

    <div id="login">
        <aside>
            <figure>

                <x-logo></x-logo>

            </figure>

            @yield('content')

            <div class="copy">{{ date('Y')." ".config('app.name') }}</div>
        </aside>
    </div>
    <!-- /login -->


	@include('partials._scripts')

</body>
</html>
