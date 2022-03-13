<ul id="top_menu">
    <li><span><a href="{{ route('reviews.create.step1') }}" class="btn_top">Write a Review</a></span></li>
    <li><span><a href="{{ route('companies.landing') }}" class="btn_top company">Companies</a></span></li>
    @auth
        <li>
            <div class="dropdown dropdown-user">
                <a href="#" class="logged" data-toggle="dropdown"><img src="{{ Auth::user()->profile_pic }}" alt=""></a>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="{{ route('profile.reviews') }}">My Reviews</a></li>
                        <li><a href="{{ route('companies.list') }}">My Companies</a></li>
                        <li><a href="{{ route('profile.update') }}">My Profile</a></li>
                        <li><a href="{{ route('profile.password') }}">My Password</a></li>
                        @if(Auth::user()->is_admin === true)
                            <li><a href="{{ route('admin.categories.create') }}">Admin - Create a category</a></li>
                            <li><a href="{{ route('admin.company.list') }}">Admin - Companies</a></li>
                            <li><a href="{{ route('admin.company.upload') }}">Admin - Companies Upload</a></li>
                            <li><a href="{{ route('admin.user.list') }}">Admin - Users</a></li>
                        @endif
                        <li>
                            <form id="frmLogout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="#" id="btnLogout">Log Out</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    @endauth
    @guest
        <li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
    @endguest

</ul>
<!-- /top_menu -->
<a href="#menu" class="btn_mobile">
    <div class="hamburger hamburger--spin" id="hamburger">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
</a>
<!-- /btn_mobile -->

<nav id="menu" class="main-menu">
    <ul>
        <li><span><a href="{{ route('home') }}">Home</a></span>
            {{-- <ul>
                <li><a href="index.html">Home version 1</a></li>
                <li><a href="index-2.html">Home version 2 (GDPR)</a></li>
            </ul> --}}
        </li>
        <li><span><a href="{{ route('reviews.list') }}">Reviews</a></span>
            {{-- <ul>
                <li>
                    <span><a href="#0">Layouts</a></span>
                    <ul>
                        <li><a href="grid-listings-filterstop.html">Grid listings 1</a></li>
                        <li><a href="grid-listings-filterscol.html">Grid listings 2</a></li>
                        <li><a href="row-listings-filterscol.html">Row listings</a></li>
                    </ul>
                </li>
                <li><a href="reviews-page.html">Reviews page</a></li>
                <li><a href="write-review.html">Write a review</a></li>
                <li><a href="confirm.html">Confirm page</a></li>
                <li><a href="user-dashboard.html">User Dashboard</a></li>
                <li><a href="user-settings.html">User Settings</a></li>
            </ul> --}}
        </li>

        {{-- <li><span><a href="pricing.html">Pricing</a></span></li> --}}
        {{-- <li><span><a href="#0">Pages</a></span>
            <ul>
                <li><a href="companies-landing.html">Compannies Landing Page</a></li>
                <li><a href="all-categories.html">Companies Categories Page</a></li>
                <li><a href="category-companies-listings-filterstop.html">Companies Listing Page</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="help.html">Help Section</a></li>
                <li><a href="faq.html">Faq Section</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li>
                    <span><a href="#0">Icon Packs</a></span>
                    <ul>
                        <li><a href="icon-pack-1.html">Icon pack 1</a></li>
                        <li><a href="icon-pack-2.html">Icon pack 2</a></li>
                        <li><a href="icon-pack-3.html">Icon pack 3</a></li>
                        <li><a href="icon-pack-4.html">Icon pack 4</a></li>
                    </ul>
                </li>
                <li><a href="404.html">404 page</a></li>
            </ul>
        </li> --}}
        {{-- <li><span><a href="#0">Buy template</a></span></li> --}}
        <li class="d-block d-sm-none"><span><a href="{{ route('reviews.create.step1') }}" class="btn_top">Write a Review</a></span></li>
        <li class="d-block d-sm-none"><span><a href="{{ route('companies.landing') }}" class="btn_top company">Companies</a></span></li>
    </ul>
</nav>
