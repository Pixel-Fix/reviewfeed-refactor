
@foreach($categories as $category)
<div class="col-lg-4 col-sm-6">
    <a href="{{ route('reviews.categories',$category->slug) }}" class="grid_item">
        <figure>
            <img src="{{ $category->image }}" alt="">
            <div class="info">
                <small></small>
                <em><i class="icon-comment"></i> {{ $category->total_reviews($category->id) }} Reviews</em>
                <h3>{{ $category->name }}</h3>
            </div>
        </figure>
    </a>
</div>
@endforeach
