@extends('frontend.layouts.landing')

@section('title', $blog->title . ' | Jenz Audio')
@section('meta_description', $blog->meta_description ?: Str::limit(strip_tags($blog->description), 160))

@push('head')
    <meta name="keywords" content="{{ $blog->meta_keyword ?: $blog->tags }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog->title }} | Jenz Audio">
    <meta property="og:description" content="{{ $blog->meta_description ?: Str::limit(strip_tags($blog->description), 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta property="og:url" content="{{ route('blogdetail', $blog->slug) }}">
    <link rel="canonical" href="{{ route('blogdetail', $blog->slug) }}">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "{{ $blog->title }}",
        "image": "{{ asset('storage/' . $blog->image) }}",
        "author": {"@type": "Person","name": "{{ $blog->author }}"},
        "publisher": {"@type": "Organization","name": "Jenz Audio"},
        "datePublished": "{{ $blog->created_at->toIso8601String() }}",
        "description": "{{ Str::limit(strip_tags($blog->description), 160) }}"
    }
    </script>
@endpush

@section('content')

{{-- Hero --}}
<section class="bg-zinc-900 border-b border-zinc-800 py-12 px-4">
    <div class="mx-auto max-w-4xl">

        {{-- Tags --}}
        @if ($blog->tags)
            <div class="mb-5 flex flex-wrap gap-2">
                @foreach (array_map('trim', explode(',', $blog->tags)) as $tag)
                    <span class="inline-flex items-center rounded-full bg-amber-500/10 border border-amber-500/20 px-3 py-1 text-xs font-semibold text-amber-400">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Title --}}
        <h1 class="mb-5 text-2xl md:text-4xl font-bold leading-tight text-white">
            {{ $blog->title }}
        </h1>

        {{-- Meta bar --}}
        <div class="flex flex-wrap items-center gap-x-5 gap-y-2 pb-5 border-b border-zinc-800 text-sm text-zinc-400">
            <span class="flex items-center gap-2">
                <svg class="h-4 w-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5"/></svg>
                {{ $blog->created_at->isoFormat('D MMMM Y') }}
            </span>
            @if ($blog->author)
                <span class="flex items-center gap-2">
                    <svg class="h-4 w-4 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                    {{ $blog->author }}
                </span>
            @endif
        </div>

        {{-- Breadcrumb --}}
        <nav class="mt-4 flex items-center gap-2 text-xs text-zinc-600">
            <a href="{{ route('landing-page') }}" class="hover:text-amber-400 transition">Home</a>
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('blog') }}" class="hover:text-amber-400 transition">Blog</a>
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            <span class="text-zinc-400 truncate max-w-[200px] md:max-w-xs">{{ $blog->title }}</span>
        </nav>

    </div>
</section>

{{-- Content --}}
<section class="py-12 px-4">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-10 lg:grid-cols-[1fr_300px]">

            {{-- Article --}}
            <article>

                {{-- Featured image --}}
                <div class="mb-8 overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-950">
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="w-full h-auto block cursor-zoom-in"
                         onclick="openLightbox(this.src, this.alt)"
                         onerror="this.parentElement.style.display='none'">
                </div>

                {{-- Description lead --}}
                @if ($blog->description)
                    <div class="mb-8 rounded-xl border-l-4 border-amber-500 bg-amber-500/5 px-5 py-4">
                        <p class="text-base font-medium leading-relaxed text-zinc-200">{{ $blog->description }}</p>
                    </div>
                @endif

                {{-- Body --}}
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

                {{-- Tags footer --}}
                @if ($blog->tags)
                    <div class="mt-10 flex flex-wrap items-center gap-2 rounded-xl border border-zinc-800 bg-zinc-900 p-5">
                        <span class="text-xs font-semibold text-zinc-500 mr-1">Tags:</span>
                        @foreach (array_map('trim', explode(',', $blog->tags)) as $tag)
                            <span class="rounded-full bg-zinc-800 border border-zinc-700 px-3 py-1 text-xs text-zinc-300 hover:border-amber-500/50 hover:text-amber-400 transition cursor-default">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- CTA WA --}}
                <div class="mt-8 rounded-2xl border border-amber-500/20 bg-gradient-to-br from-amber-500/10 to-amber-500/5 p-7">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-500/20">
                            <svg class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-white text-lg mb-1">Tertarik upgrade audio mobilmu?</p>
                            <p class="text-sm text-zinc-400 mb-4">Konsultasi gratis dengan tim Jenz Audio. Kami bantu dari pemilihan produk sampai instalasi profesional.</p>
                            <a href="https://wa.me/6281617000097?text=Halo%20Jenz%20Audio%2C%20saya%20baca%20artikel%20{{ urlencode($blog->title) }}%20dan%20ingin%20konsultasi"
                               target="_blank"
                               class="inline-flex items-center gap-2 rounded-xl bg-amber-500 px-5 py-2.5 text-sm font-bold text-zinc-900 hover:bg-amber-400 transition">
                                Konsultasi Sekarang — Gratis
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </article>

            {{-- Sidebar --}}
            <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">

                {{-- Related posts --}}
                @if ($randomBlogs->count())
                    <div class="rounded-2xl border border-zinc-800 bg-zinc-900 overflow-hidden">
                        <div class="px-5 py-4 border-b border-zinc-800 flex items-center gap-2">
                            <svg class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg>
                            <h3 class="text-sm font-bold text-white">Artikel Lainnya</h3>
                        </div>
                        <div class="divide-y divide-zinc-800">
                            @foreach ($randomBlogs as $relatedBlog)
                                <a href="{{ route('blogdetail', $relatedBlog->slug) }}"
                                   class="group flex gap-4 items-start p-4 hover:bg-zinc-800/50 transition">
                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-lg bg-zinc-800">
                                        <img src="{{ asset('storage/' . $relatedBlog->image) }}"
                                             alt="{{ $relatedBlog->title }}"
                                             class="h-full w-full object-cover transition group-hover:scale-105"
                                             onerror="this.parentElement.style.background='#3f3f46'">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-zinc-200 line-clamp-2 group-hover:text-amber-400 transition leading-snug">
                                            {{ $relatedBlog->title }}
                                        </p>
                                        <p class="mt-1.5 text-xs text-zinc-500">
                                            {{ $relatedBlog->created_at->isoFormat('D MMM Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Tags --}}
                @if ($blog->tags)
                    <div class="rounded-2xl border border-zinc-800 bg-zinc-900 p-5">
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"/></svg>
                            <h3 class="text-sm font-bold text-white">Tags</h3>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach (array_map('trim', explode(',', $blog->tags)) as $tag)
                                <span class="rounded-full border border-zinc-700 bg-zinc-800 px-3 py-1 text-xs text-zinc-300 hover:border-amber-500/50 hover:text-amber-400 transition cursor-default">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Sticky CTA --}}
                <div class="rounded-2xl border border-amber-500/20 bg-zinc-900 p-5 text-center">
                    <div class="mb-4 flex justify-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-amber-500/10 border border-amber-500/20">
                            <svg class="h-7 w-7 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z"/></svg>
                        </div>
                    </div>
                    <p class="font-bold text-white mb-1">Upgrade Audio Mobilmu</p>
                    <p class="text-xs text-zinc-500 mb-4 leading-relaxed">Konsultasi gratis dengan teknisi berpengalaman</p>
                    <a href="https://wa.me/6281617000097?text=Halo%20Jenz%20Audio%2C%20saya%20ingin%20konsultasi"
                       target="_blank"
                       class="block w-full rounded-xl bg-amber-500 py-2.5 text-sm font-bold text-zinc-900 hover:bg-amber-400 transition">
                        Chat Sekarang
                    </a>
                </div>

            </aside>
        </div>
    </div>
</section>

<style>
    .blog-content{font-size:15px;line-height:1.85;color:#d4d4d8}
    .blog-content h2{color:#fff;font-size:1.35rem;font-weight:700;margin:2.5rem 0 .75rem;padding-bottom:.5rem;border-bottom:1px solid #27272a}
    .blog-content h3{color:#e4e4e7;font-size:1.1rem;font-weight:700;margin:1.75rem 0 .5rem}
    .blog-content p{margin-bottom:1.25rem}
    .blog-content ul,.blog-content ol{margin:0 0 1.25rem 1.5rem;padding:0}
    .blog-content li{margin-bottom:.5rem;padding-left:.25rem}
    .blog-content ul li::marker{color:#f59e0b}
    .blog-content img{border-radius:12px;margin:1.5rem 0;max-width:100%;height:auto}
    .blog-content a{color:#f59e0b;text-decoration:underline;text-underline-offset:3px}
    .blog-content blockquote{border-left:4px solid #f59e0b;padding:.875rem 1.25rem;background:#18181b;border-radius:0 10px 10px 0;margin:1.75rem 0;color:#a1a1aa;font-style:italic}
    .blog-content strong,.blog-content b{color:#fff;font-weight:700}
    .blog-content code{background:#27272a;padding:2px 6px;border-radius:5px;font-size:.85em;color:#fbbf24;font-family:monospace}
    .blog-content pre{background:#18181b;border:1px solid #27272a;border-radius:10px;padding:1rem;overflow-x:auto;margin:1.25rem 0}
    .blog-content table{width:100%;border-collapse:collapse;margin:1.5rem 0}
    .blog-content th,.blog-content td{border:1px solid #27272a;padding:.625rem 1rem;text-align:left}
    .blog-content th{background:#18181b;color:#fff;font-weight:600}
</style>

{{-- Lightbox modal --}}
<div id="jenz-lightbox"
     onclick="closeLightbox(event)"
     style="display:none;position:fixed;inset:0;z-index:99999;background:rgba(0,0,0,0.93);cursor:zoom-out;align-items:center;justify-content:center;padding:24px">
    <button onclick="closeLightbox()" title="Tutup"
            style="position:absolute;top:16px;right:20px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);color:#fff;font-size:20px;width:44px;height:44px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;line-height:1;transition:background .2s">✕</button>
    <img id="jenz-lightbox-img" src="" alt=""
         onclick="event.stopPropagation()"
         style="max-width:90vw;max-height:88vh;object-fit:contain;border-radius:12px;box-shadow:0 30px 100px rgba(0,0,0,0.8);cursor:default">
</div>

<script>
function openLightbox(src, alt) {
    const lb = document.getElementById('jenz-lightbox');
    document.getElementById('jenz-lightbox-img').src = src;
    document.getElementById('jenz-lightbox-img').alt = alt || '';
    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox(e) {
    if (e && e.target === document.getElementById('jenz-lightbox-img')) return;
    document.getElementById('jenz-lightbox').style.display = 'none';
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>

@endsection
