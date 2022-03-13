<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
                    <h3>Quick Links</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_1">
                    <ul class="links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('reviews.list') }}">Reviews</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endguest
                        <li><a href="{{ route('register') }}">Create account</a></li>
                        <li><a href="{{ route('companies.landing') }}">For Companies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
                    <h3>Categories</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_2">
                    <ul class="links">
                        @php $categories = App\Models\Category::inRandomOrder()->take(5)->get() @endphp
                        @foreach ($categories as $category)
                            <li><a href="{{ route('reviews.categories',$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
                    <h3>Contacts</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_3">
                    <ul class="contacts">
                        {{-- <li><i class="ti-home"></i>97845 Baker st. 567<br>Los Angeles - US</li>
                        <li><i class="ti-headphone-alt"></i>+61 23 8093 3400</li> --}}
                        <li><i class="ti-email"></i><a href="#">{{ config('app.email') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_4" aria-expanded="false" aria-controls="collapse_ft_4" class="collapse_bt_mobile">
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                    <h3>Keep in touch</h3>
                </a>
                <div class="collapse show" id="collapse_ft_4">
                    <div id="newsletter">
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                        <form method="post" action="{{ route('newsletter.subscribe',['#newsletter']) }}" name="" id="">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="newsletteremail" class="form-control" placeholder="Your email">
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                    <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/ReviewFeedNet/"><i class="ti-facebook"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/reviewfeednet"><i class="ti-twitter-alt"></i></a></li>
                            {{-- <li><a href="#0"><i class="ti-google"></i></a></li>
                            <li><a href="#0"><i class="ti-pinterest"></i></a></li>
                            <li><a href="#0"><i class="ti-instagram"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <small>All information contained on {{ config('app.name') }} is user generated content, opinions, and views. This does not necessarily reflect the opinion and views of {{ config('app.name') }} and any disputes arising from, in relation to or in connection with, the site are to be governed by the laws of the State of Queensland. Please <a href="{{ route('disclaimer') }}">click here</a> for the full disclaimer.</small>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {{-- <ul id="footer-selector">
                    <li>
                        <div class="styled-select" id="lang-selector">
                            <select>
                                <option value="English" selected>English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                    </li>
                </ul> --}}
            </div>
            <div class="col-lg-6">
                <ul id="additional_links">
                    <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy</a></li>
                    <li><span>© {{ date('Y') }} {{ config('app.name') }}</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
