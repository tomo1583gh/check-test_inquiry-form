@if ($paginator->hasPages())
<ul class="pagination-box" role="navigation">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="disabled">&laquo;</li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    @if (is_string($element))
    <li class="disabled">{{ $element }}</li>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active">{{ $page }}</li>
    @else
    <li><a href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
    <li class="disabled">&raquo;</li>
    @endif
</ul>
@endif