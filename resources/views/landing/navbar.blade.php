@php
    $jenz = config('jenz');
    $waNav = 'https://wa.me/' . $jenz['whatsapp'] . '?text=' . urlencode('Halo, saya mau tanya soal audio mobil');

    //menu utama, dipakai desktop & mobile biar ga beda isi
    $navLinks = [
        ['label' => 'Paket Harga', 'href' => '/#pricing', 'hash' => '#pricing'],
        ['label' => 'Layanan', 'href' => '/#services', 'hash' => '#services'],
        ['label' => 'Hasil Kerja', 'href' => '/#portfolio', 'hash' => '#portfolio'],
        ['label' => 'Ulasan', 'href' => '/#testimonials', 'hash' => '#testimonials'],
        ['label' => 'Lokasi', 'href' => '/#contact', 'hash' => '#contact'],
    ];
@endphp

<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled ? 'bg-zinc-950/95 backdrop-blur-md shadow-lg shadow-black/30' : 'bg-gradient-to-b from-zinc-950/80 to-transparent'">

    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-3">

        {{-- Logo --}}
        <a href="{{ route('landing-page') }}" class="flex shrink-0 items-center gap-2" aria-label="Jenz Audio beranda">
            <img src="{{ asset('redesign/images/jenzlogobg.png') }}" class="h-9 w-auto md:h-10" alt="Jenz Audio"
                width="120" height="40">
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden items-center gap-7 text-sm font-semibold lg:flex">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" onclick="jenzNavTo(event,'{{ $link['hash'] }}')"
                    class="text-zinc-300 transition hover:text-amber-500">{{ $link['label'] }}</a>
            @endforeach

            <a href="{{ route('blog') }}"
                class="transition {{ request()->routeIs('blog') || request()->routeIs('blogdetail') ? 'text-amber-500' : 'text-zinc-300 hover:text-amber-500' }}">
                Blog
            </a>
        </div>

        {{-- CTA + rating, desktop --}}
        <div class="hidden shrink-0 items-center gap-4 lg:flex">
            <a href="{{ $jenz['google']['url'] }}" target="_blank" rel="noopener"
                class="flex items-center gap-1.5 text-xs text-zinc-400 transition hover:text-amber-500"
                aria-label="Lihat {{ $jenz['google']['reviews'] }} ulasan Google Jenz Audio">
                <svg class="h-4 w-4 text-amber-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                </svg>
                <span class="font-bold text-white">{{ number_format($jenz['google']['rating'], 1, ',', '.') }}</span>
                <span>({{ $jenz['google']['reviews'] }})</span>
            </a>

            <a href="{{ $waNav }}" target="_blank" rel="noopener"
                onclick="return jenzTrackWa(this.href);"
                class="flex items-center rounded-lg bg-amber-500 px-5 py-2.5 font-semibold text-zinc-900 transition hover:bg-amber-400">
                <svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path
                        d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                </svg>
                Chat Sekarang
            </a>
        </div>

        {{-- Mobile: WA + toggle --}}
        <div class="flex items-center gap-2 lg:hidden">
            <a href="{{ $waNav }}" target="_blank" rel="noopener"
                onclick="return jenzTrackWa(this.href);"
                class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-zinc-900">
                Chat
            </a>

            <button @click="open = !open" class="p-1 text-white focus:outline-none"
                :aria-expanded="open" aria-controls="jenz-mobile-menu" aria-label="Buka menu">
                <svg x-show="!open" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="jenz-mobile-menu" x-show="open" x-cloak x-transition
        class="border-t border-zinc-800 bg-zinc-950/98 px-4 pb-6 pt-2 backdrop-blur-lg lg:hidden">

        @foreach ($navLinks as $link)
            <a href="{{ $link['href'] }}" onclick="jenzNavTo(event,'{{ $link['hash'] }}')" @click="open=false"
                class="block border-b border-zinc-900 py-3 text-zinc-300 transition hover:text-amber-400">{{ $link['label'] }}</a>
        @endforeach

        <a href="{{ route('blog') }}" @click="open=false"
            class="block border-b border-zinc-900 py-3 transition {{ request()->routeIs('blog') || request()->routeIs('blogdetail') ? 'font-semibold text-amber-500' : 'text-zinc-300 hover:text-amber-400' }}">
            Blog
        </a>

        <a href="{{ $jenz['google']['url'] }}" target="_blank" rel="noopener"
            class="mt-4 flex items-center justify-center gap-1.5 rounded-lg border border-zinc-800 py-3 text-sm text-zinc-300">
            <svg class="h-4 w-4 text-amber-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
            </svg>
            <span class="font-bold text-white">{{ number_format($jenz['google']['rating'], 1, ',', '.') }}</span>
            dari {{ $jenz['google']['reviews'] }} ulasan Google
        </a>
    </div>
</nav>

<script>
    // kirim konversi Google Ads kalau gtag ada, kalau ga ada tetep buka linknya
    function jenzTrackWa(url) {
        if (typeof gtag_report_conversion === 'function') {
            return gtag_report_conversion(url);
        }
        return true;
    }

    function jenzNavTo(e, hash) {
        if (window.location.pathname === '/' || window.location.pathname === '') {
            var el = document.querySelector(hash);
            if (el) {
                e.preventDefault();
                el.scrollIntoView({ behavior: 'smooth' });
            }
        }
        // di halaman lain: biarin href="/#section" jalan normal
    }
</script>
