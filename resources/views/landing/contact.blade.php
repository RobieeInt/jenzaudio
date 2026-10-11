@php
    $jenz = config('jenz');

    //nomor WA: utamain dari DB kalau diisi admin, kalau ga ada pakai config
    $waPhone = preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '') ?: $jenz['whatsapp'];
    if (strlen($waPhone) < 9) {
        $waPhone = $jenz['whatsapp'];
    }

    $lat = $jenz['lat'];
    $lng = $jenz['lng'];

    //tombol rute: di HP langsung buka aplikasi Google Maps dan mulai navigasi
    $rutaUrl = 'https://www.google.com/maps/dir/?api=1&destination=' . $lat . ',' . $lng
        . '&travelmode=driving';

    //peta embed, ga butuh API key
    $embedUrl = 'https://maps.google.com/maps?q=' . $lat . ',' . $lng . '&z=16&hl=id&output=embed';

    $waPesan = 'Halo, saya mau tanya soal audio mobil';
@endphp

<section id="contact" class="overflow-hidden bg-zinc-900 px-4 py-16 md:py-24" x-data="contactSection()"
    x-intersect.once="seen = true">
    <div class="mx-auto max-w-7xl">

        {{-- Heading --}}
        <div class="mb-12 transform text-center transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Mampir yuk
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Lokasi &amp; Kontak
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Gading Serpong, Tangerang. Konsultasi gratis, nggak harus langsung pasang.
            </p>
        </div>

        <div class="grid gap-6 lg:grid-cols-5">

            {{-- Peta + tombol rute --}}
            <div class="transform transition-all duration-700 lg:col-span-3"
                :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">

                <div class="overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-950">
                    {{-- Peta --}}
                    <div class="relative aspect-[4/3] w-full sm:aspect-[16/10]">
                        <iframe src="{{ $embedUrl }}" title="Lokasi Jenz Audio di Google Maps" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" allowfullscreen
                            class="absolute inset-0 h-full w-full border-0"></iframe>
                    </div>

                    {{-- Alamat + tombol --}}
                    <div class="border-t border-zinc-800 p-5 sm:p-6">
                        <div class="mb-5 flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path
                                    d="M12 2a7 7 0 00-7 7c0 4.4 5 9.4 6.4 10.8a1 1 0 001.2 0C14 18.4 19 13.4 19 9a7 7 0 00-7-7z" />
                                <circle cx="12" cy="9" r="2.5" />
                            </svg>
                            <p class="text-sm leading-relaxed text-zinc-300">
                                {{ $jenz['address'] }}
                            </p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row">
                            {{-- Tombol utama: langsung navigasi --}}
                            <a href="{{ $rutaUrl }}" target="_blank" rel="noopener"
                                class="flex flex-1 items-center justify-center rounded-xl bg-amber-500 px-6 py-3.5 text-sm font-bold text-zinc-950 shadow-lg shadow-amber-500/20 transition hover:scale-[1.02] hover:bg-amber-400">
                                <svg class="mr-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polygon points="3 11 22 2 13 21 11 13 3 11" />
                                </svg>
                                Rute ke Toko
                            </a>

                            {{-- Sekunder: lihat halaman toko + ulasan --}}
                            <a href="{{ $jenz['maps_url'] }}" target="_blank" rel="noopener"
                                class="flex flex-1 items-center justify-center rounded-xl border border-zinc-700 px-6 py-3.5 text-sm font-semibold text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                                <svg class="mr-2 h-4 w-4 text-amber-500" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                                </svg>
                                Lihat di Google Maps
                            </a>
                        </div>

                        <p class="mt-4 text-center text-xs text-zinc-500 sm:text-left">
                            Tombol rute langsung buka aplikasi Google Maps di HP Anda.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Info kontak --}}
            <div class="space-y-4 lg:col-span-2">

                {{-- WhatsApp, paling menonjol --}}
                <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($waPesan) }}" target="_blank" rel="noopener"
                    onclick="return jenzTrackWa(this.href);"
                    class="group flex transform items-center gap-4 rounded-xl border border-amber-500/40 bg-amber-500/10 p-5 transition-all duration-500 hover:border-amber-500 hover:bg-amber-500/20"
                    :class="seen ? 'translate-x-0 opacity-100' : 'translate-x-6 opacity-0'">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-amber-500 text-zinc-900">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path
                                d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                        </svg>
                    </span>
                    <span class="min-w-0">
                        <span class="block font-semibold text-white">WhatsApp</span>
                        <span class="block truncate text-sm text-amber-400">{{ $jenz['phone_display'] }}</span>
                        <span class="block text-xs text-zinc-400">Paling cepat dibalas</span>
                    </span>
                </a>

                {{-- Telepon --}}
                <a href="tel:+{{ $jenz['whatsapp'] }}"
                    class="flex transform items-center gap-4 rounded-xl border border-zinc-800 bg-zinc-950 p-5 transition-all duration-500 hover:border-amber-500"
                    :class="seen ? 'translate-x-0 opacity-100' : 'translate-x-6 opacity-0'"
                    style="transition-delay: 80ms">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-500">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <path
                                d="M3 5a2 2 0 012-2h2.2a1 1 0 01.96.73l1.1 4.08a1 1 0 01-.27.97l-1.6 1.6a12 12 0 005.4 5.4l1.6-1.6a1 1 0 01.97-.27l4.08 1.1a1 1 0 01.73.96V19a2 2 0 01-2 2h-1A16 16 0 013 6V5z" />
                        </svg>
                    </span>
                    <span class="min-w-0">
                        <span class="block font-semibold text-white">Telepon</span>
                        <span class="block truncate text-sm text-zinc-400">{{ $jenz['phone_display'] }}</span>
                    </span>
                </a>

                {{-- Jam buka --}}
                <div class="transform rounded-xl border border-zinc-800 bg-zinc-950 p-5 transition-all duration-500"
                    :class="seen ? 'translate-x-0 opacity-100' : 'translate-x-6 opacity-0'"
                    style="transition-delay: 160ms">
                    <div class="mb-3 flex items-center gap-4">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-500">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="font-semibold text-white">Jam Buka</span>
                    </div>

                    <dl class="space-y-1.5 text-sm">
                        @foreach ($jenz['hours'] as $hari => $jam)
                            <div class="flex items-center justify-between gap-3">
                                <dt class="text-zinc-400">{{ $hari }}</dt>
                                <dd class="{{ strtolower($jam) === 'tutup' ? 'text-zinc-600' : 'font-medium text-white' }}">
                                    {{ $jam }}
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                {{-- Sosial --}}
                <div class="transform rounded-xl border border-zinc-800 bg-zinc-950 p-5 transition-all duration-500"
                    :class="seen ? 'translate-x-0 opacity-100' : 'translate-x-6 opacity-0'"
                    style="transition-delay: 240ms">
                    <p class="mb-3 text-sm font-semibold text-white">Lihat hasil kerja terbaru</p>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ $jenz['social']['instagram'] }}" target="_blank" rel="noopener"
                            class="rounded-lg border border-zinc-700 px-4 py-2 text-xs font-medium text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                            Instagram
                        </a>
                        <a href="{{ $jenz['social']['tiktok'] }}" target="_blank" rel="noopener"
                            class="rounded-lg border border-zinc-700 px-4 py-2 text-xs font-medium text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                            TikTok
                        </a>
                        <a href="{{ $jenz['social']['youtube'] }}" target="_blank" rel="noopener"
                            class="rounded-lg border border-zinc-700 px-4 py-2 text-xs font-medium text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                            YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function contactSection() {
        return {
            seen: false,
        }
    }
</script>
