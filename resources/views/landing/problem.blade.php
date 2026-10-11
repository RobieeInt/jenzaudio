@php
    $jenz = config('jenz');

    //keluhan yang paling sering masuk, diangkat dari ulasan Google
    $keluhan = [
        [
            'icon' => 'volume',
            'masalah' => 'Suara pecah atau kurang nendang',
            'solusi' => 'Biasanya speaker bawaan udah nggak kuat. Kami cek dulu sistemnya, baru rekomendasi speaker atau subwoofer yang pas — nggak asal ganti mahal.',
        ],
        [
            'icon' => 'wallet',
            'masalah' => 'Takut kena biaya kaget',
            'solusi' => 'Harga paket kami tulis terbuka di website. Sebelum dikerjakan, semua dirinci dulu. Kalau budget terbatas, kami kasih opsi bertahap.',
        ],
        [
            'icon' => 'question',
            'masalah' => 'Bingung mau pilih merek apa',
            'solusi' => 'Nggak perlu ngerti istilah audio. Cukup cerita mobil apa, suka musik apa, budget berapa — sisanya kami yang susunkan.',
        ],
        [
            'icon' => 'wrench',
            'masalah' => 'Khawatir mobil jadi rusak',
            'solusi' => 'Instalasi tanpa potong kabel bodi, semua rapi dan bisa dibalikin ke standar. Ada garansi pemasangan.',
        ],
    ];

    $iconPaths = [
        'volume' => '<polygon points="11 5 6 9 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/>',
        'wallet' => '<path d="M3 7h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"/><path d="M3 7l12-3v3"/><circle cx="17" cy="13" r="1.3"/>',
        'question' => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 1 1 3.2 2.4c-.6.2-.9.7-.9 1.3v.4"/><path d="M12 17h.01"/>',
        'wrench' => '<path d="M14.7 6.3a4 4 0 0 0 5 5l-9.4 9.4a2.1 2.1 0 0 1-3-3l9.4-9.4z"/><path d="M14.7 6.3L17.5 3.5"/>',
    ];
@endphp

<section id="masalah" class="bg-zinc-950 px-4 py-16 md:py-24" x-data="{ seen: false }" x-ref="section"
    x-intersect.once="seen = true">
    <div class="mx-auto max-w-6xl">

        {{-- Heading --}}
        <div class="mb-12 transform text-center transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Nggak paham audio? Santai
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Keluhan yang paling sering kami tangani
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Kebanyakan pelanggan kami datang tanpa tahu istilah teknis. Nggak masalah &mdash;
                cukup ceritain keluhannya, kami yang carikan solusinya.
            </p>
        </div>

        {{-- Grid keluhan --}}
        <div class="grid gap-5 sm:grid-cols-2">
            @foreach ($keluhan as $index => $item)
                <div class="transform rounded-2xl border border-zinc-800 bg-zinc-900 p-6 transition-all duration-500 hover:border-amber-500/50"
                    :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                    style="transition-delay: {{ $index * 90 }}ms">

                    <div class="mb-4 flex items-start gap-4">
                        <span
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-500/10 text-amber-500">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                {!! $iconPaths[$item['icon']] !!}
                            </svg>
                        </span>

                        <h3 class="pt-1.5 text-lg font-semibold text-white">
                            &ldquo;{{ $item['masalah'] }}&rdquo;
                        </h3>
                    </div>

                    <p class="text-sm leading-relaxed text-zinc-400">
                        {{ $item['solusi'] }}
                    </p>
                </div>
            @endforeach
        </div>

        {{-- CTA --}}
        <div class="mt-10 text-center transform transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'" style="transition-delay: 400ms">
            <p class="mb-4 text-zinc-400">Keluhan Anda nggak ada di atas?</p>
            <a href="https://wa.me/{{ $jenz['whatsapp'] }}?text={{ urlencode('Halo, saya mau tanya soal audio mobil saya') }}"
                target="_blank" rel="noopener" onclick="return jenzTrackWa(this.href);"
                class="inline-flex items-center justify-center rounded-xl border-2 border-amber-500 px-7 py-3.5 text-sm font-bold text-amber-500 transition hover:bg-amber-500 hover:text-zinc-950">
                Ceritain Aja ke Kami, Gratis
            </a>
        </div>
    </div>
</section>
