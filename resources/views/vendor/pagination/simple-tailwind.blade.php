@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center mt-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-secondary text-white">
                &larr; Назад 
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-secondary text-white">
                 Напред &rarr;
            </a>
        @else
        @endif
    </nav>
@endif
