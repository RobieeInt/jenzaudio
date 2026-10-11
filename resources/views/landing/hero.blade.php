@php
    $jenz = config('jenz');
    $tahunPengalaman = now()->year - $jenz['since'];
    $waHero = 'https://wa.me/' . $jenz['whatsapp'] . '?text=' . urlencode('Halo, saya mau konsultasi audio mobil. Mobil saya ');

    //slide background hero, diatur di config/jenz.php. Kosong = pakai background gradien
    $heroImages = collect($hero['images'] ?? $jenz['hero_images'])
        ->map(fn ($path) => str_starts_with($path, 'http') ? $path : asset($path))
        ->values()
        ->all();
@endphp

<section id="hero" x-data="heroSection()" x-init="init()"
    class="relative flex min-h-[100svh] w-full flex-col justify-center overflow-hidden pb-14 pt-28">

    {{-- Background dasar: selalu ada, jadi teks ga pernah ketiban gambar ramai --}}
    <div class="absolute inset-0 bg-zinc-950" aria-hidden="true">
        {{-- grid halus --}}
        <div class="absolute inset-0 opacity-[0.18]"
            style="background-image:linear-gradient(to right,#3f3f46 1px,transparent 1px),linear-gradient(to bottom,#3f3f46 1px,transparent 1px);background-size:56px 56px">
        </div>
        {{-- glow amber --}}
        <div class="absolute left-1/2 top-1/3 h-[32rem] w-[32rem] -translate-x-1/2 -translate-y-1/3 rounded-full bg-amber-500/12 blur-[120px]">
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-zinc-950 to-transparent"></div>
    </div>

    {{-- Foto background, cuma kalau diisi di config --}}
    <template x-for="(img, index) in images" :key="index">
        <div class="absolute inset-0 transition-opacity duration-[1200ms] ease-in-out"
            :class="index === i ? 'opacity-100' : 'opacity-0'" aria-hidden="true">
            <div class="absolute inset-0 scale-105 bg-cover bg-center"
                :style="{ backgroundImage: 'url(' + img + ')' }"></div>
            {{-- overlay tebal biar judul tetap kebaca --}}
            <div class="absolute inset-0 bg-gradient-to-b from-zinc-950/90 via-zinc-950/80 to-zinc-950"></div>
        </div>
    </template>

    {{-- Content --}}
    <div class="relative z-10 mx-auto w-full max-w-5xl px-4 text-center">
        <div class="transform transition-all duration-1000"
            :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-8 opacity-0'">

            {{-- Badge rating Google, bukti sosial paling atas --}}
            <a href="{{ $jenz['google']['url'] }}" target="_blank" rel="noopener"
                class="mb-6 inline-flex items-center gap-2 rounded-full border border-amber-500/40 bg-amber-500/10 px-4 py-2 text-xs font-semibold text-amber-400 transition hover:border-amber-500 hover:bg-amber-500/20 sm:text-sm">
                <span class="flex" aria-hidden="true">
                    @for ($s = 0; $s < 5; $s++)
                        <svg class="h-3.5 w-3.5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                        </svg>
                    @endfor
                </span>
                {{ number_format($jenz['google']['rating'], 1, ',', '.') }} dari
                {{ $jenz['google']['reviews'] }} ulasan Google
            </a>

            {{-- H1: satu-satunya H1 di halaman, tampil juga di HP --}}
            <h1 class="mb-5 text-3xl font-bold leading-tight text-white sm:text-5xl md:text-6xl lg:text-7xl">
                Audio Mobil Jernih,
                <span class="block text-amber-500">Pasang Rapi, Harga Jelas</span>
            </h1>

            <p class="mx-auto mb-8 max-w-2xl text-base text-zinc-300 sm:text-lg md:text-xl">
                Bengkel audio mobil di Gading Serpong sejak {{ $jenz['since'] }}. Konsultasi dulu gratis
                &mdash; kami bantu pilih paket yang pas sama mobil dan budget Anda.
            </p>

            {{-- CTA --}}
            <div class="flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
                <a href="{{ $waHero }}" target="_blank" rel="noopener"
                    onclick="return jenzTrackWa(this.href);"
                    class="group flex items-center justify-center rounded-xl bg-amber-500 px-7 py-4 text-base font-bold text-zinc-900 shadow-lg shadow-amber-500/25 transition-all hover:scale-[1.03] hover:bg-amber-400">
                    <svg class="mr-2 h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                    </svg>
                    Konsultasi Gratis via WhatsApp
                </a>

                <a href="{{ route('paket') }}"
                    class="flex items-center justify-center rounded-xl border-2 border-zinc-600 px-7 py-4 text-base font-semibold text-white transition-all hover:border-amber-500 hover:text-amber-500">
                    Lihat Paket &amp; Harga
                </a>
            </div>

            {{-- Poin cepat, biar awam langsung nangkep --}}
            <ul class="mx-auto mt-8 flex max-w-3xl flex-wrap items-center justify-center gap-x-6 gap-y-2 text-xs text-zinc-400 sm:text-sm">
                <li class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 shrink-0 text-amber-500" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Harga transparan, no biaya tersembunyi
                </li>
                <li class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 shrink-0 text-amber-500" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Garansi pemasangan
                </li>
                <li class="flex items-center gap-1.5">
                    <svg class="h-4 w-4 shrink-0 text-amber-500" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{ $tahunPengalaman }} tahun pengalaman
                </li>
            </ul>
        </div>
    </div>

    {{-- Indikator scroll --}}
    <div class="absolute bottom-5 left-1/2 z-10 hidden -translate-x-1/2 animate-bounce sm:block" aria-hidden="true">
        <div class="flex h-11 w-7 items-start justify-center rounded-full border-2 border-zinc-500 p-2">
            <div class="h-2 w-1 animate-pulse rounded-full bg-amber-400"></div>
        </div>
    </div>
</section>

<script>
    function heroSection() {
        return {
            images: @json($heroImages),
            i: 0,
            visible: false,

            init() {
                this.visible = true;

                if (this.images.length < 2) return;

                // ganti slide tiap 6 detik
                setInterval(() => {
                    this.i = (this.i + 1) % this.images.length;
                }, 6000);
            },
        };
    }
</script>
