@extends('layouts.app')

@section('page-search')

    @include('partials._page-search')

@endsection

@section('content')
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type date_filter">
                            <h6>Date</h6>
                            <ul>
                                <li>
                                    <label class="container_radio">All
                                        <input type="radio" id="all_2" name="filters_listing" value="all" checked data-filter="*" class="selected">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_radio">Latest
                            <input type="radio" id="latest" name="filters_listing" value="latest" data-filter=".latest">
                            <span class="checkmark"></span>
                        </label>
                                </li>
                                <li>
                                    <label class="container_radio">Oldest
                            <input type="radio" id="oldest" name="filters_listing" value="oldest" data-filter=".oldest">
                            <span class="checkmark"></span>
                        </label>
                                </li>

                            </ul>
                        </div>
                        <div class="filter_type">
                            <h6>Category</h6>
                            <ul>
                                <li>
                                    <label class="container_check">Restaurants <small>43</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Shops <small>33</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Bars <small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Events <small>44</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="filter_type">
                            <h6>Rating</h6>
                            <ul>
                                <li>
                                    <label class="container_check">Superb 9+ <small>34</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Very Good 8+ <small>21</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Good 7+ <small>15</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">Pleasant 6+ <small>34</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/collapse -->
                </div>
                <!--/filters col-->
            </aside>
            <!-- /aside -->

            <div class="col-lg-9">

                <div class="isotope-wrapper">
                    <div class="row">

                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar1.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Jhon Doe</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Avesome Experience"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te.Viderer petentium cu his. Tollit molestie suscipiantur his et...</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar2.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Marika</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Great products"</h4>
                                <p>Et nec tantas accusamus salutatus</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar3.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Lukas Lee</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Excellent Support"</h4>
                                <p>Mucius doctus constituto pri at, ne cetero postulant pro. At vix utinam corpora, ea oblique moderatius usu. Vix id viris consul honestatis, an constituto deterruisset consectetuer pro.....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->
                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar4.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Mark Twain</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Shipping Very Fast"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar5.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Margaret</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Perfect"</h4>
                                <p>Mucius doctus constituto pri at, ne cetero postulant pro. At vix utinam corpora, ea oblique moderatius usu. Vix id viris consul honestatis, an constituto deterruisset consectetuer pro.....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar6.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Tom Jones</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Everything good"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->
                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar7.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Jhon Doe</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Avesome Experience"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te.Viderer petentium cu his. Tollit molestie suscipiantur his et...</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar8.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Marika</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Great products"</h4>
                                <p>Et nec tantas accusamus salutatus</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item latest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Lukas Lee</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Excellent Support"</h4>
                                <p>Mucius doctus constituto pri at, ne cetero postulant pro. At vix utinam corpora, ea oblique moderatius usu. Vix id viris consul honestatis, an constituto deterruisset consectetuer pro.....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->
                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar3.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Mark Twain</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Shipping Very Fast"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar6.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star-half"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Margaret</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Perfect"</h4>
                                <p>Mucius doctus constituto pri at, ne cetero postulant pro. At vix utinam corpora, ea oblique moderatius usu. Vix id viris consul honestatis, an constituto deterruisset consectetuer pro.....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->

                        <div class="col-12 isotope-item oldest">
                            <div class="review_listing">
                                <div class="clearfix add_bottom_15">
                                    <figure><img src="img/avatar8.jpg" alt=""></figure>
                                    <span class="rating"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star empty"></i><em>4.50/5.00</em></span>
                                    <small>Shops</small>
                                </div>
                                <h3><strong>Tom Jones</strong> reviewed <a href="reviews-page.html">Fnac</a></h3>
                                <h4>"Everything good"</h4>
                                <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut....</p>
                                <ul class="clearfix">
                                    <li><small>Published: 26.08.2018</small></li>
                                    <li><a href="reviews-page.html" class="btn_1 small">Read review</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /review_listing grid -->
                    </div>
                    <!-- /row -->
                    </div>
                    <!-- /isotope-wrapper -->

                    <p class="text-center"><a href="#0" class="btn_1 rounded add_top_15">Load more</a></p>

            </div>
            <!-- /col -->
        </div>
    </div>
@endsection
