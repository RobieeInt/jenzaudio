@if ($paginator->hasPages())
    <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link"><i
                        class="feather icon-feather-arrow-left fs-18 d-xs-none"></i></span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link"><i
                        class="feather icon-feather-arrow-right fs-18 d-xs-none"></i></span></li>
        @endif
    </ul>
@endif
