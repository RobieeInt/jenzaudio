@php
    $jenz = config('jenz');

    $langkah = [
        [
            'judul' => 'Chat & Konsultasi',
            'detail' => 'Kirim WhatsApp, sebutin mobil apa dan keluhannya. Gratis, nggak ada kewajiban beli.',
            'catatan' => 'Dibalas jam kerja',
        ],
        [
            'judul' => 'Cek Mobil & Pilih Paket',
            'detail' => 'Datang ke bengkel, mobil kami cek langsung. Anda dikasih beberapa opsi lengkap dengan harganya.',
            'catatan' => 'Harga final sebelum dikerjakan',
        ],
        [
            'judul' => 'Pengerjaan',
            'detail' => 'Dikerjakan teknisi kami. Bisa ditungguin di ruang tunggu ber-AC, kopi gratis.',
            'catatan' => 'Rata-rata 1&ndash;2 hari',
        ],
        [
            'judul' => 'Tes Suara & Garansi',
            'detail' => 'Dengerin hasilnya bareng, kami tuning sampai sesuai selera. Pulang bawa garansi pemasangan.',
            'catatan' => 'Tuning ulang gratis',
        ],
    ];
@endphp

<section id="cara-pesan" class="relative overflow-hidden bg-zinc-900 px-4 py-16 md:py-24" x-data="{ seen: false }"
    x-intersect.once="seen = true">

    <div class="absolute left-1/2 top-0 h-64 w-64 -translate-x-1/2 rounded-full bg-amber-500/5 blur-3xl"
        aria-hidden="true"></div>

    <div class="relative mx-auto max-w-6xl">

        {{-- Heading --}}
        <div class="mb-14 transform text-center transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Prosesnya gampang
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Cara Pesan, Cuma 4 Langkah
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Dari chat pertama sampai mobil siap dibawa pulang.
            </p>
        </div>

        {{-- Langkah --}}
        <ol class="relative grid gap-6 md:grid-cols-4 md:gap-4">
            {{-- Garis penghubung, desktop aja --}}
            <div class="absolute left-0 right-0 top-7 hidden h-px bg-gradient-to-r from-transparent via-zinc-700 to-transparent md:block"
                aria-hidden="true"></div>

            @foreach ($langkah as $index => $item)
                <li class="relative transform transition-all duration-500"
                    :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                    style="transition-delay: {{ $index * 120 }}ms">

                    {{-- Nomor --}}
                    <div class="mb-5 flex items-center gap-4 md:block">
                        <span
                            class="relative z-10 flex h-14 w-14 shrink-0 items-center justify-center rounded-full border-2 border-amber-500 bg-zinc-900 text-xl font-bold text-amber-500 md:mb-5">
                            {{ $index + 1 }}
                        </span>

                        <h3 class="text-lg font-semibold text-white md:hidden">{{ $item['judul'] }}</h3>
                    </div>

                    <h3 class="mb-2 hidden text-lg font-semibold text-white md:block">{{ $item['judul'] }}</h3>

                    <p class="mb-3 text-sm leading-relaxed text-zinc-400">
                        {{ $item['detail'] }}
                    </p>

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-zinc-800 px-3 py-1 text-xs text-zinc-300">
                        <svg class="h-3.5 w-3.5 text-amber-500" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {!! $item['catatan'] !!}
                    </span>
                </li>
            @endforeach
        </ol>

        {{-- CTA --}}
        <div class="mt-14 transform rounded-2xl border border-zinc-800 bg-zinc-950 p-6 text-center transition-all duration-700 md:p-8"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'" style="transition-delay: 500ms">
            <h3 class="mb-2 text-xl font-bold text-white md:text-2xl">Siap mulai dari langkah 1?</h3>
            <p class="mb-6 text-sm text-zinc-400 md:text-base">
                Konsultasi gratis, nggak harus langsung ambil paket.
            </p>

            <div class="flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
                <a href="https://wa.me/{{ $jenz['whatsapp'] }}?text={{ urlencode('Halo, saya mau konsultasi audio mobil. Mobil saya ') }}"
                    target="_blank" rel="noopener" onclick="return jenzTrackWa(this.href);"
                    class="flex items-center justify-center rounded-xl bg-amber-500 px-7 py-3.5 text-sm font-bold text-zinc-950 shadow-lg shadow-amber-500/20 transition hover:scale-[1.03] hover:bg-amber-400">
                    <svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                    </svg>
                    Chat WhatsApp
                </a>

                <a href="#pricing" onclick="jenzNavTo(event,'#pricing')"
                    class="flex items-center justify-center rounded-xl border border-zinc-700 px-7 py-3.5 text-sm font-semibold text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                    Lihat harga dulu
                </a>
            </div>
        </div>
    </div>
</section>
