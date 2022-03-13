@if ($paginator->hasPages())
<div class="pagination__wrapper add_bottom_15">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li><a class="prev" title="previous page">&#10094;</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="prev" title="previous page">&#10094;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a class="" title="p">...</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="#" class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="next" title="next page">&#10095;</a></li>
        @else
            <li><a class="next" title="next page">&#10095;</a></li>
        @endif
    </ul>
</div>

@endif
