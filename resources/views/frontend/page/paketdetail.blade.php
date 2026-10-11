@extends('frontend.layouts.page')

@section('title', $package->name . ' ' . $package->brand_name . ' - Jenz Audio')

@section('meta_description',
    Str::limit(
        strip_tags($package->short_description ?: $package->description) ?:
        'Paket upgrade audio mobil ' . $package->brand_name . ' di Jenz Audio.',
        150))

@push('head')
    <link rel="canonical" href="{{ route('paketdetail', $package->slug) }}">

    @php
        //Schema.org biar harga & diskon kebaca Google
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $package->name . ' ' . $package->brand_name,
            'description' => Str::limit(strip_tags($package->short_description ?: $package->description), 300),
            'image' => $package->thumbnail,
            'brand' => ['@type' => 'Brand', 'name' => 'Jenz Audio'],
        ];

        if ($package->final_price) {
            $schema['offers'] = [
                '@type' => 'Offer',
                'url' => route('paketdetail', $package->slug),
                'priceCurrency' => 'IDR',
                'price' => (string) $package->final_price,
                'availability' => 'https://schema.org/InStock',
            ];
        }
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
    @php
        // section content dirender sebelum body layout, jadi $waPhone disiapin di sini
        $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');
        $waMessage = 'Halo, saya tertarik dengan ' . $package->name . ' untuk mobil ' . $package->brand_name . '. Bisa konsultasi?';
        $waLink = 'https://wa.me/' . $waPhone . '?text=' . urlencode($waMessage);
        $gallery = $package->galleries->sortByDesc('is_default')->values();
    @endphp

    <section class="bg-zinc-950 px-4 pb-20 pt-32">
        <div class="mx-auto max-w-7xl">
            {{-- Breadcrumb --}}
            <nav class="mb-8 flex flex-wrap items-center gap-2 text-sm text-zinc-500">
                <a href="{{ route('landing-page') }}" class="transition hover:text-amber-500">Home</a>
                <span>/</span>
                <a href="{{ route('paket') }}" class="transition hover:text-amber-500">Paket</a>
                @if ($package->carBrand)
                    <span>/</span>
                    <a href="{{ route('paket', ['merk' => $package->carBrand->slug]) }}"
                        class="transition hover:text-amber-500">{{ $package->carBrand->name }}</a>
                @endif
                <span>/</span>
                <span class="text-zinc-300">{{ $package->name }}</span>
            </nav>

            <div class="grid gap-10 lg:grid-cols-5">
                {{-- Galeri --}}
                @php
                    $galleryUrls = $gallery->count()
                        ? $gallery->map(fn ($item) => asset('/storage/' . $item->image))->all()
                        : [$package->thumbnail];
                @endphp

                <div class="lg:col-span-3" x-data="{ active: 0, images: @js($galleryUrls) }">
                    <div class="relative aspect-[4/3] overflow-hidden border border-zinc-800 bg-zinc-900">
                        {{-- src awal di-render server biar ga nunggu Alpine, :src buat ganti pas thumbnail diklik --}}
                        <img src="{{ $galleryUrls[0] }}" :src="images[active]" alt="{{ $package->name }}"
                            class="h-full w-full object-cover">

                        @if ($package->has_discount)
                            <div class="absolute left-4 top-4 rounded-full bg-red-600 px-4 py-1.5 text-sm font-bold text-white">
                                Hemat {{ $package->discount_percent }}%
                            </div>
                        @endif

                        @if ($package->is_popular)
                            <div class="absolute right-4 top-4 rounded-full bg-amber-500 px-4 py-1.5 text-sm font-bold text-zinc-900">
                                TERLARIS
                            </div>
                        @endif
                    </div>

                    {{-- Thumbnail --}}
                    @if ($gallery->count() > 1)
                        <div class="mt-4 grid grid-cols-4 gap-3 sm:grid-cols-5">
                            @foreach ($gallery as $index => $item)
                                <button type="button" @click="active = {{ $index }}"
                                    class="aspect-square overflow-hidden border-2 transition"
                                    :class="active === {{ $index }} ? 'border-amber-500' : 'border-zinc-800 hover:border-zinc-600'">
                                    <img src="{{ asset('/storage/' . $item->image) }}" alt="{{ $package->name }}"
                                        loading="lazy" class="h-full w-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Info + harga --}}
                <div class="lg:col-span-2">
                    <span class="inline-block rounded-full border border-zinc-700 px-3 py-1 text-xs text-zinc-400">
                        {{ $package->brand_name }}
                    </span>

                    <h1 class="mt-4 text-3xl font-bold text-white md:text-4xl">
                        {{ $package->name }}
                    </h1>

                    @if ($package->car_models)
                        <p class="mt-2 text-sm text-amber-500">
                            Cocok untuk: {{ $package->car_models }}
                        </p>
                    @endif

                    @if ($package->short_description)
                        <p class="mt-4 text-zinc-400">{{ $package->short_description }}</p>
                    @endif

                    {{-- Harga --}}
                    <div class="mt-6 border border-zinc-800 bg-zinc-900 p-6">
                        @if ($package->has_discount)
                            <p class="text-base text-zinc-500 line-through">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </p>
                        @endif

                        @if ($package->final_price)
                            <p class="text-4xl font-bold text-amber-500">
                                Rp {{ number_format($package->final_price, 0, ',', '.') }}
                            </p>
                        @else
                            <p class="text-3xl font-bold text-amber-500">Hubungi Kami</p>
                        @endif

                        @if ($package->has_discount && $package->discount_until)
                            <p class="mt-2 text-xs text-red-400">
                                Promo sampai {{ $package->discount_until->translatedFormat('d F Y') }}
                            </p>
                        @endif

                        <div class="mt-5 space-y-2 text-sm text-zinc-400">
                            @if ($package->warranty)
                                <p class="flex items-center">
                                    <svg class="mr-2 h-4 w-4 flex-shrink-0 text-amber-500" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                    {{ $package->warranty }}
                                </p>
                            @endif

                            @if ($package->duration)
                                <p class="flex items-center">
                                    <svg class="mr-2 h-4 w-4 flex-shrink-0 text-amber-500" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path d="M12 7v5l3 2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    {{ $package->duration }}
                                </p>
                            @endif
                        </div>

                        <a href="{{ $waLink }}" target="_blank" onclick="return gtag_report_conversion(this.href);"
                            class="mt-6 flex w-full items-center justify-center rounded-md bg-amber-500 py-4 text-base font-bold text-zinc-950 transition hover:bg-amber-400">
                            <svg class="mr-2 h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                            </svg>
                            Konsultasi & Booking
                        </a>

                        <p class="mt-3 text-center text-xs text-zinc-500">
                            Konsultasi gratis, ga harus langsung ambil paket
                        </p>
                    </div>

                    {{-- Isi paket --}}
                    @if (count($package->feature_list))
                        <div class="mt-6 border border-zinc-800 bg-zinc-900 p-6">
                            <h2 class="mb-4 text-lg font-bold text-white">Isi Paket</h2>
                            <ul class="space-y-3">
                                @foreach ($package->feature_list as $feature)
                                    <li class="flex items-start">
                                        <svg class="mr-3 mt-0.5 h-5 w-5 flex-shrink-0 text-amber-500" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                        <span class="text-zinc-300">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Deskripsi lengkap --}}
            @if ($package->description)
                <div class="mt-16 border border-zinc-800 bg-zinc-900 p-6 md:p-10">
                    <h2 class="mb-6 text-2xl font-bold text-white">Tentang Paket Ini</h2>
                    <div class="jenz-prose text-zinc-300">
                        {!! $package->description !!}
                    </div>
                </div>
            @endif

            {{-- Paket lainnya --}}
            @if ($otherPackages->count())
                <div class="mt-20">
                    <h2 class="mb-8 text-2xl font-bold text-white">Paket Lainnya</h2>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($otherPackages as $other)
                            <a href="{{ route('paketdetail', $other->slug) }}"
                                class="group flex flex-col overflow-hidden border border-zinc-800 bg-zinc-900 transition hover:border-amber-500">
                                <div class="relative aspect-[4/3] overflow-hidden bg-zinc-950">
                                    <img src="{{ $other->thumbnail }}" alt="{{ $other->name }}" loading="lazy"
                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    @if ($other->has_discount)
                                        <div
                                            class="absolute left-3 top-3 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">
                                            Hemat {{ $other->discount_percent }}%
                                        </div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <p class="text-xs text-zinc-500">{{ $other->brand_name }}</p>
                                    <h3 class="mt-1 text-lg font-semibold text-white transition group-hover:text-amber-500">
                                        {{ $other->name }}
                                    </h3>
                                    <p class="mt-2 font-bold text-amber-500">
                                        @if ($other->final_price)
                                            Rp {{ number_format($other->final_price, 0, ',', '.') }}
                                        @else
                                            Hubungi Kami
                                        @endif
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('head')
    <style>
        /* styling buat HTML dari CKEditor */
        .jenz-prose p { margin-bottom: 1rem; line-height: 1.75; }
        .jenz-prose p:last-child { margin-bottom: 0; }
        .jenz-prose h1, .jenz-prose h2, .jenz-prose h3, .jenz-prose h4 { color: #fff; font-weight: 700; margin: 1.5rem 0 .75rem; }
        .jenz-prose h2 { font-size: 1.5rem; }
        .jenz-prose h3 { font-size: 1.25rem; }
        .jenz-prose ul, .jenz-prose ol { margin: 0 0 1rem 1.25rem; }
        .jenz-prose ul { list-style: disc; }
        .jenz-prose ol { list-style: decimal; }
        .jenz-prose li { margin-bottom: .5rem; }
        .jenz-prose a { color: #f59e0b; text-decoration: underline; }
        .jenz-prose strong { color: #fff; }
        .jenz-prose img { max-width: 100%; height: auto; margin: 1rem 0; }
        .jenz-prose table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
        .jenz-prose th, .jenz-prose td { border: 1px solid #3f3f46; padding: .5rem .75rem; }
    </style>
@endpush
