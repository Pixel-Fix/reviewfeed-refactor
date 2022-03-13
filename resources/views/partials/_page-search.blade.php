<div id="results">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-md-4 col-10">
                @if($search_criteria !== null)
                    <h1>{{ $reviews->total() }} reviews for "{{ $search_criteria }}"</h1>
                @else
                    <h1>Reviews</h1>
                @endif
            </div>
            <div class="col-xl-5 col-md-6 col-2">
                <form action="{{ route('reviews.list',['filters_category' => $filters_category, 'filters_rating' => $filters_rating]) }}" method="POST">
                    @csrf
                    <a href="#" class="search_mob btn_search_mobile"></a> <!-- /open search panel -->
                    <div class="row no-gutters custom-search-input-2 inner">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <input class="form-control" type="text" name="search_criteria" placeholder="Search Reviews...">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            @php $states = App\Models\State::orderBy('name','asc')->get() @endphp
                            <select class="wide" name="state" id="state">
                                <option value="all">All States</option>
                                @foreach($states as $state)
                                    <option >{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-1 col-lg-1">
                            <input type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
         <div class="search_mob_wp">
            <form action="{{ route('reviews.list') }}" method="POST">
                @csrf
                <div class="custom-search-input-2">
                    <div class="form-group">
                        <input class="form-control" type="text"  name="search_criteria"  placeholder="Search Reviews...">
                        <i class="icon_search"></i>
                    </div>
                    {{-- <div class="form-group">
                        <input class="form-control" type="text" placeholder="Where">
                        <i class="icon_pin_alt"></i>
                    </div> --}}
                    <select class="wide" name="state" id="state">
                        <option value="all">All States</option>
                        @foreach($states as $state)
                            <option >{{ $state->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Search">
                </div>
            </form>
         </div>
         <!-- /search_mobile -->
    </div>
    <!-- /container -->
</div>
