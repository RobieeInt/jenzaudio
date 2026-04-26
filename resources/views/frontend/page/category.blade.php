<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>{{ $category->name ?? 'Kategori Produk' }} - Jenz Audio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jenz Audio">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="{{ Str::limit(strip_tags($category->description ?? 'Kategori produk Jenz Audio'), 150) }}">

    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">

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
    @endphp

    <div class="min-h-screen bg-zinc-950">
        @include('landing.navbar')

        <main>
            {{-- Hero --}}
            <section class="relative overflow-hidden bg-zinc-950 px-4 pb-16 pt-32">
                <div class="absolute inset-0 bg-gradient-to-b from-zinc-900 via-zinc-950 to-zinc-950"></div>
                <div
                    class="absolute left-1/2 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-amber-500/10 blur-3xl">
                </div>

                <div class="relative mx-auto max-w-7xl">
                    <div class="mb-8 flex flex-wrap items-center gap-2 text-sm text-zinc-400">
                        <a href="{{ route('landing-page') }}" class="transition hover:text-amber-500">
                            Home
                        </a>
                        <span>/</span>
                        <span class="text-zinc-300">Kategori Produk</span>
                    </div>

                    <div class="max-w-3xl">
                        <span
                            class="mb-4 inline-flex rounded-full border border-amber-500/30 bg-amber-500/10 px-4 py-2 text-sm font-semibold text-amber-500">
                            Kategori
                        </span>

                        <h1 class="mb-5 text-4xl font-bold leading-tight text-white md:text-6xl">
                            {{ $category->name }}
                        </h1>

                        @if (!empty($category->description))
                            <p class="max-w-2xl text-lg leading-relaxed text-zinc-400">
                                {{ $category->description }}
                            </p>
                        @else
                            <p class="max-w-2xl text-lg leading-relaxed text-zinc-400">
                                Pilihan produk audio mobil dari kategori {{ $category->name }}. Cek produknya dulu,
                                lalu konsultasikan kebutuhan mobil kamu ke Jenz Audio.
                            </p>
                        @endif
                    </div>
                </div>
            </section>

            {{-- Products --}}
            <section class="bg-zinc-900 px-4 py-20">
                <div class="mx-auto max-w-7xl">
                    <div class="mb-12 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                        <div>
                            <h2 class="mb-3 text-3xl font-bold text-white md:text-4xl">
                                Produk {{ $category->name }}
                            </h2>
                            <div class="h-1 w-24 bg-amber-500"></div>
                        </div>

                        <a href="{{ route('landing-page') }}#products"
                            class="inline-flex items-center justify-center rounded-xl border border-zinc-700 bg-zinc-950 px-5 py-3 text-sm font-semibold text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                            Lihat Kategori Lain
                        </a>
                    </div>

                    @if ($products->count())
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($products as $item)
                                @php
                                    $image = $item->galleries->first()?->image
                                        ? Storage::url($item->galleries->first()->image)
                                        : asset('redesign/images/default-product.jpg');

                                    $productName = $item->name ?? 'Produk';
                                    $whatsappMessage = "Halo Jenz Audio, saya tertarik dengan produk *$productName* dari kategori *{$category->name}*. Saya mau konsultasi dulu dan rencana datang ke toko. Bisa dibantu infonya?";
                                    $waUrl = 'https://wa.me/' . $waPhone . '?text=' . urlencode($whatsappMessage);
                                @endphp

                                <div
                                    class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-950 shadow-2xl shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:border-amber-500">

                                    <a href="{{ route('productDetail', ['slug' => $item->slug]) }}"
                                        class="relative aspect-square overflow-hidden bg-zinc-900">
                                        <img src="{{ $image }}" alt="{{ $item->name }}"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent opacity-70">
                                        </div>

                                        @if (!empty($item->badge_label))
                                            <div
                                                class="absolute right-4 top-4 rounded-full bg-amber-500 px-3 py-1 text-xs font-bold text-zinc-950">
                                                {{ $item->badge_label }}
                                            </div>
                                        @endif
                                    </a>

                                    <div class="flex flex-1 flex-col p-5">
                                        <div class="mb-3 flex items-center justify-between gap-3">
                                            <a href="{{ route('categorydetail', ['slug' => $item->category->slug]) }}"
                                                class="rounded-full border border-zinc-700 px-3 py-1 text-xs font-semibold text-zinc-400 transition hover:border-amber-500 hover:text-amber-500">
                                                {{ $item->category->name }}
                                            </a>

                                            <span class="text-xs text-zinc-500">
                                                {{ $item->created_at?->format('d M Y') }}
                                            </span>
                                        </div>

                                        <a href="{{ route('productDetail', ['slug' => $item->slug]) }}"
                                            class="mb-2 line-clamp-2 text-lg font-bold text-white transition hover:text-amber-500">
                                            {{ Str::limit($item->name, 60) }}
                                        </a>

                                        <p class="mb-5 line-clamp-3 text-sm leading-relaxed text-zinc-400">
                                            {{ Str::limit(strip_tags($item->short_description ?? $item->description), 100) }}
                                        </p>

                                        <div class="mt-auto grid gap-3">
                                            <a href="{{ route('productDetail', ['slug' => $item->slug]) }}"
                                                class="flex items-center justify-center rounded-lg border border-zinc-700 bg-zinc-900 px-4 py-3 text-sm font-semibold text-white transition hover:border-amber-500 hover:bg-zinc-800 hover:text-amber-500">
                                                Lihat Detail
                                            </a>

                                            <a href="{{ $waUrl }}"
                                                target="_blank"
                                                onclick="return gtag_report_conversion(this.href);"
                                                class="flex items-center justify-center rounded-lg bg-amber-500 px-4 py-3 text-sm font-bold text-zinc-950 transition hover:bg-amber-400">
                                                Chat via WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="rounded-2xl border border-zinc-800 bg-zinc-950 px-6 py-16 text-center">
                            <p class="text-xl font-semibold text-white">
                                Belum ada produk tersedia untuk kategori ini.
                            </p>
                            <p class="mt-2 text-zinc-400">
                                Produk belum masuk, bukan berarti harapan harus ikut kosong.
                            </p>
                        </div>
                    @endif
                </div>
            </section>
        </main>

        @include('landing.footer')
    </div>

    {{-- Sticky WhatsApp Button --}}
    <a href="https://wa.me/{{ $waPhone }}?text=Halo%2C%20saya%20mau%20tanya%20dong"
        class="whatsapp-float"
        target="_blank"
        aria-label="Chat via WhatsApp"
        onclick="return gtag_report_conversion(this.href);">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="50" height="50">
        <span class="whatsapp-tooltip">Konsultasiin dulu yu Gratis</span>
    </a>
</body>

</html>
