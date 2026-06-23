@extends('frontend.layouts.landing')

@section('title', 'Blog & Tips Audio Mobil | Jenz Audio')
@section('meta_description', 'Baca artikel tips audio mobil, review produk, dan inspirasi custom audio dari tim Jenz Audio.')

@push('head')
    <meta name="keywords" content="blog audio mobil, tips audio mobil, custom audio, instalasi audio, jenz audio">
    <link rel="canonical" href="{{ route('blog') }}">
@endpush

@section('content')

{{-- Hero --}}
<section class="bg-zinc-900 border-b border-zinc-800 py-16 px-4">
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-amber-400">
                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>
                    Tips & Inspirasi
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">Blog Audio Mobil</h1>
                <p class="text-zinc-400 max-w-lg text-base">Artikel, tips instalasi, review produk, dan inspirasi custom audio dari tim Jenz Audio.</p>
            </div>
            <nav class="flex items-center gap-2 text-sm text-zinc-500 shrink-0">
                <a href="{{ route('landing-page') }}" class="hover:text-amber-400 transition">Home</a>
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                <span class="text-zinc-300 font-medium">Blog</span>
            </nav>
        </div>
    </div>
</section>

{{-- Divider --}}
<div class="h-px bg-gradient-to-r from-transparent via-amber-500/40 to-transparent"></div>

{{-- Grid --}}
<section class="py-16 px-4">
    <div class="mx-auto max-w-7xl">

        @if ($blogs->isEmpty())
            <div class="flex flex-col items-center justify-center py-32 text-center">
                <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-zinc-800">
                    <svg class="h-10 w-10 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-zinc-400">Belum ada artikel</p>
                <p class="mt-1 text-sm text-zinc-600">Nantikan konten terbaru dari tim Jenz Audio.</p>
            </div>
        @else
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($blogs as $post)
                    <article class="group flex flex-col rounded-2xl border border-zinc-800 bg-zinc-900 overflow-hidden transition-all duration-300 hover:-translate-y-1.5 hover:border-amber-500/40 hover:shadow-2xl hover:shadow-black/40">

                        {{-- Thumbnail --}}
                        <a href="{{ route('blogdetail', $post->slug) }}" class="block shrink-0">
                            <div class="relative h-52 w-full overflow-hidden bg-zinc-800">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     onerror="this.src='{{ asset('redesign/images/banneraudio.webp') }}'">
                                {{-- Tag overlay --}}
                                @if ($post->tags)
                                    <span class="absolute left-3 top-3 rounded-full bg-black/60 backdrop-blur-sm px-3 py-1 text-xs font-semibold text-amber-400 border border-amber-500/30">
                                        {{ explode(',', $post->tags)[0] }}
                                    </span>
                                @endif
                            </div>
                        </a>

                        {{-- Body --}}
                        <div class="flex flex-1 flex-col p-6">

                            {{-- Meta --}}
                            <div class="mb-3 flex items-center gap-3 text-xs text-zinc-500">
                                <span>{{ $post->created_at->isoFormat('D MMM Y') }}</span>
                                @if ($post->author)
                                    <span class="h-1 w-1 rounded-full bg-zinc-700"></span>
                                    <span>{{ $post->author }}</span>
                                @endif
                            </div>

                            {{-- Title --}}
                            <h2 class="mb-3 text-[15px] font-bold leading-snug text-white line-clamp-2 group-hover:text-amber-400 transition-colors">
                                <a href="{{ route('blogdetail', $post->slug) }}">{{ $post->title }}</a>
                            </h2>

                            {{-- Excerpt --}}
                            @if ($post->description)
                                <p class="flex-1 mb-5 text-sm leading-relaxed text-zinc-400 line-clamp-3">
                                    {{ $post->description }}
                                </p>
                            @endif

                            {{-- Footer --}}
                            <div class="mt-auto pt-4 border-t border-zinc-800">
                                <a href="{{ route('blogdetail', $post->slug) }}"
                                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-amber-500 hover:text-amber-400 transition-colors">
                                    Baca Selengkapnya
                                    <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($blogs->hasPages())
                <div class="mt-14 flex justify-center">
                    <div class="jenz-pagination">{{ $blogs->links() }}</div>
                </div>
            @endif

        @endif
    </div>
</section>

<style>
    .jenz-pagination .pagination{display:flex;gap:4px;list-style:none;padding:0;margin:0}
    .jenz-pagination .page-link{display:flex;align-items:center;justify-content:center;min-width:40px;height:40px;padding:0 12px;border-radius:10px;background:#18181b;border:1px solid #27272a;color:#a1a1aa;font-size:14px;text-decoration:none;transition:all .2s}
    .jenz-pagination .page-link:hover,.jenz-pagination .page-item.active .page-link{background:#f59e0b;border-color:#f59e0b;color:#000;font-weight:700}
    .jenz-pagination .page-item.disabled .page-link{opacity:.3;pointer-events:none}
</style>

@endsection
