{{-- Pagination Tailwind, tema gelap, nyambung sama desain landing --}}
@if ($paginator->hasPages())
    <nav class="flex flex-wrap items-center justify-center gap-2" role="navigation"
        aria-label="{{ __('Pagination Navigation') }}">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="flex h-10 min-w-[40px] cursor-default items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-600">
                &laquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-400 transition hover:border-amber-500 hover:bg-amber-500 hover:text-zinc-950">
                &laquo;
            </a>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span
                    class="flex h-10 min-w-[40px] cursor-default items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-600">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page"
                            class="flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-amber-500 bg-amber-500 px-3 text-sm font-bold text-zinc-950">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-400 transition hover:border-amber-500 hover:bg-amber-500 hover:text-zinc-950">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="flex h-10 min-w-[40px] items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-400 transition hover:border-amber-500 hover:bg-amber-500 hover:text-zinc-950">
                &raquo;
            </a>
        @else
            <span
                class="flex h-10 min-w-[40px] cursor-default items-center justify-center rounded-lg border border-zinc-800 bg-zinc-900 px-3 text-sm text-zinc-600">
                &raquo;
            </span>
        @endif
    </nav>
@endif
