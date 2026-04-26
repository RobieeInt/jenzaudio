<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>{{ $product->name ?? 'Detail Produk' }} - Jenz Audio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jenz Audio">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="{{ Str::limit(strip_tags($product->short_description ?? $product->description ?? 'Detail produk Jenz Audio'), 150) }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">

    {{-- Tailwind / Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #18181b;
        }

        ::-webkit-scrollbar-thumb {
            background: #f59e0b;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #d97706;
        }

        ::selection {
            background-color: #f59e0b;
            color: #18181b;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #25D366;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        .whatsapp-float img {
            display: block;
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 60px;
            background-color: #25D366;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            transform: translateY(5px);
            transition: all 0.3s ease;
            font-size: 14px;
            pointer-events: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-float:hover .whatsapp-tooltip {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 576px) {
            .whatsapp-tooltip {
                display: none;
            }
        }
    </style>

    {{-- Google tag --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D9GHSSH4L4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-D9GHSSH4L4');
        gtag('config', 'AW-611713340');

        gtag('config', 'AW-611713340/OfR6CMzc7ssbELyC2KMC', {
            'phone_conversion_number': '6281617000097'
        });

        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) !== 'undefined') {
                    window.open(url, '_blank');
                }
            };

            gtag('event', 'conversion', {
                'send_to': 'AW-611713340/nq18CJKI8ssbELyC2KMC',
                'value': 1.0,
                'currency': 'IDR',
                'event_callback': callback
            });

            return false;
        }
    </script>
</head>

<body class="bg-zinc-950 text-white" data-mobile-nav-style="classic">
    @php
        $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');
        $galleryImages = $product->galleries ?? collect();
        $fallbackImage = asset('redesign/images/default-product.jpg');
        $mainImage = $galleryImages->first()?->image ? Storage::url($galleryImages->first()->image) : $fallbackImage;
    @endphp

    <div class="min-h-screen bg-zinc-950">
        @include('landing.navbar')

        <main x-data="productDetailPage()">

            {{-- Hero --}}
            <section class="relative overflow-hidden bg-zinc-950 px-4 pb-16 pt-32">
                <div class="absolute inset-0 bg-gradient-to-b from-zinc-900 via-zinc-950 to-zinc-950"></div>
                <div
                    class="absolute left-1/2 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-amber-500/10 blur-3xl">
                </div>

                <div class="relative mx-auto max-w-7xl">
                    <div class="mb-8 flex flex-wrap items-center gap-2 text-sm text-zinc-400">
                        <a href="{{ route('landing-page') }}" class="transition hover:text-amber-500">
                            {{-- Home --}}
                        </a>
                        <span>/</span>
                        <span class="text-zinc-300">
                            {{-- Detail Produk --}}
                        </span>
                    </div>

                    <div class="max-w-3xl">
                        <span
                            class="mb-4 inline-flex rounded-full border border-amber-500/30 bg-amber-500/10 px-4 py-2 text-sm font-semibold text-amber-500">
                            {{ $product->category->name ?? 'Produk Audio Mobil' }}
                        </span>

                        <h1 class="mb-5 text-4xl font-bold leading-tight text-white md:text-6xl">
                            {{ $product->name }}
                        </h1>

                        <p class="max-w-2xl text-lg leading-relaxed text-zinc-400">
                            {{ $product->short_description ?? 'Produk audio mobil berkualitas dari Jenz Audio untuk pengalaman suara yang lebih maksimal.' }}
                        </p>
                    </div>
                </div>
            </section>

            {{-- Product Detail --}}
            <section class="bg-zinc-900 px-4 py-20">
                <div class="mx-auto max-w-7xl">
                    <div class="grid gap-10 lg:grid-cols-2 lg:items-start">

                        {{-- Gallery --}}
                        <div
                            class="overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-950 shadow-2xl shadow-black/30">
                            <div class="relative aspect-square overflow-hidden bg-zinc-900">
                                <img :src="activeImage" alt="{{ $product->name }}"
                                    class="h-full w-full object-cover transition-all duration-500">

                                @if (!empty($product->badge_label))
                                    <div
                                        class="absolute right-4 top-4 rounded-full bg-amber-500 px-4 py-2 text-xs font-bold text-zinc-950">
                                        {{ $product->badge_label }}
                                    </div>
                                @endif
                            </div>

                            <div class="grid grid-cols-5 gap-3 border-t border-zinc-800 bg-zinc-950 p-4">
                                @forelse ($galleryImages as $gallery)
                                    <button type="button"
                                        class="aspect-square overflow-hidden rounded-lg border transition hover:border-amber-500"
                                        :class="activeImage === '{{ Storage::url($gallery->image) }}' ?
                                            'border-amber-500' : 'border-zinc-800'"
                                        @click="activeImage = '{{ Storage::url($gallery->image) }}'">
                                        <img src="{{ Storage::url($gallery->image) }}" alt="{{ $product->name }}"
                                            class="h-full w-full object-cover">
                                    </button>
                                @empty
                                    <button type="button"
                                        class="aspect-square overflow-hidden rounded-lg border border-amber-500">
                                        <img src="{{ $fallbackImage }}" alt="{{ $product->name }}"
                                            class="h-full w-full object-cover">
                                    </button>
                                @endforelse
                            </div>
                        </div>

                        {{-- Product Info --}}
                        <div
                            class="rounded-2xl border border-zinc-800 bg-zinc-950 p-6 shadow-2xl shadow-black/30 md:p-8">
                            <div class="mb-4 flex flex-wrap items-center gap-3">
                                <span
                                    class="rounded-full border border-zinc-700 px-4 py-1 text-xs font-semibold text-zinc-300">
                                    {{ $product->brand->name ?? 'Jenz Audio' }}
                                </span>

                                <span class="rounded-full bg-amber-500 px-4 py-1 text-xs font-bold text-zinc-950">
                                    {{ $product->category->name ?? 'Lainnya' }}
                                </span>
                            </div>

                            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                                {{ $product->name }}
                            </h2>

                            <div class="mb-6 flex flex-wrap items-center gap-4 text-sm text-zinc-400">
                                <div class="flex items-center gap-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="h-4 w-4 {{ $i < ($product->star ?? 5) ? 'text-amber-500' : 'text-zinc-700' }}"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                                        </svg>
                                    @endfor
                                </div>

                                @if (!empty($product->code))
                                    <div>
                                        <span class="font-semibold text-zinc-300">Kode:</span>
                                        {{ $product->code }}
                                    </div>
                                @endif
                            </div>

                            <div class="prose prose-invert prose-zinc mb-8 max-w-none text-zinc-400">
                                {!! $product->description ?: '<p>Deskripsi produk belum tersedia.</p>' !!}
                            </div>

                            @if (!empty($product->features))
                                <div class="mb-8">
                                    <h3 class="mb-3 text-sm font-bold uppercase tracking-wide text-white">
                                        Fitur Produk
                                    </h3>

                                    <ul class="space-y-2 text-sm text-zinc-400">
                                        @foreach (explode('|', $product->features) as $feature)
                                            @if (trim($feature))
                                                <li class="flex items-start gap-2">
                                                    <span class="text-amber-500">•</span>
                                                    <span>{{ trim($feature) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- CTA WhatsApp --}}
                            <div class="mb-8">
                                <button type="button"
                                    class="flex h-16 w-full items-center justify-center rounded-xl bg-amber-500 px-8 text-base font-extrabold text-zinc-950 shadow-lg shadow-amber-500/25 transition hover:scale-[1.02] hover:bg-amber-400 md:text-lg"
                                    @click="openWhatsApp">
                                    Chat Dulu via WhatsApp
                                </button>

                                <p class="mt-3 text-center text-sm text-zinc-500">
                                    Konsultasi gratis dulu, biar pilihan audio mobilnya pas dan gak asal beli kayak
                                    tebak-tebakan nasib.
                                </p>
                            </div>

                            {{-- Store-Oriented Info --}}
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">
                                    <div class="mb-2 text-sm font-bold text-white">
                                        Datang ke Toko, Dengerin Langsung
                                    </div>
                                    <p class="text-sm leading-relaxed text-zinc-400">
                                        Lebih enak cek langsung kualitas suara, cocokkan kebutuhan mobil, dan diskusi
                                        setting audio yang paling pas.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">
                                    <div class="mb-2 text-sm font-bold text-white">
                                        Chat Dulu Biar Gak Salah Pilih
                                    </div>
                                    <p class="text-sm leading-relaxed text-zinc-400">
                                        Kirim tipe mobil dan kebutuhan audio kamu. Tim Jenz Audio bantu arahin sebelum
                                        kamu datang ke toko.
                                    </p>
                                </div>
                            </div>

                            {{-- Meta --}}
                            <div class="mt-8 border-t border-zinc-800 pt-6 text-sm text-zinc-400">
                                @if (!empty($product->category))
                                    <div class="mb-2">
                                        <span class="font-semibold text-zinc-300">Kategori:</span>
                                        <a href="{{ route('categorydetail', ['slug' => $product->category->slug]) }}"
                                            class="text-amber-500 transition hover:text-amber-400">
                                            {{ $product->category->name }}
                                        </a>
                                    </div>
                                @endif

                                @if ($product->tags)
                                    <div>
                                        <span class="font-semibold text-zinc-300">Tags:</span>
                                        @foreach (explode(',', $product->tags) as $tag)
                                            <a href="#" class="transition hover:text-amber-500">
                                                {{ trim($tag) }}
                                            </a>@if (!$loop->last),@endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        @include('landing.footer')
    </div>

    {{-- Sticky WhatsApp Button --}}
    <a href="https://wa.me/{{ $waPhone }}?text=Halo%2C%20saya%20mau%20tanya%20dong"
        class="whatsapp-float" target="_blank" aria-label="Chat via WhatsApp"
        onclick="return gtag_report_conversion(this.href);">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="50"
            height="50">
        <span class="whatsapp-tooltip">Konsultasiin dulu yu Gratis</span>
    </a>

    <script>
        function productDetailPage() {
            return {
                activeImage: @json($mainImage),
                waPhone: @json($waPhone),
                productName: @json($product->name),

                openWhatsApp() {
                    const message =
                        `Halo Jenz Audio, saya tertarik dengan produk:\n\n📦 *${this.productName}*\n\nSaya mau konsultasi dulu dan rencana datang ke toko. Bisa dibantu infonya?`;

                    const waUrl = `https://wa.me/${this.waPhone}?text=${encodeURIComponent(message)}`;

                    if (typeof gtag_report_conversion === 'function') {
                        gtag_report_conversion(waUrl);
                    } else {
                        window.open(waUrl, '_blank');
                    }
                },
            }
        }
    </script>
</body>

</html>
