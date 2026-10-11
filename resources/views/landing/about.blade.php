@php
    $jenz = config('jenz');
    $tahunPengalaman = now()->year - $jenz['since'];

    //angka yang bisa dibuktikan, jangan diisi klaim karangan
    $stats = [
        ['angka' => $tahunPengalaman . '+', 'label' => 'Tahun melayani', 'ket' => 'Sejak ' . $jenz['since']],
        ['angka' => number_format($jenz['google']['rating'], 1, ',', '.'), 'label' => 'Rating Google', 'ket' => 'Dari 5,0'],
        ['angka' => $jenz['google']['reviews'] . '+', 'label' => 'Ulasan pelanggan', 'ket' => 'Terverifikasi Google'],
        ['angka' => '1 Hari', 'label' => 'Mulai dari', 'ket' => 'Waktu pengerjaan'],
    ];
@endphp

<section id="about" class="bg-zinc-900 px-4 py-16 md:py-24" x-data="{ seen: false }" x-intersect.once="seen = true">
    <div class="mx-auto max-w-6xl">

        <div class="grid items-center gap-12 lg:grid-cols-2">

            {{-- Cerita --}}
            <div class="transform transition-all duration-700"
                :class="seen ? 'translate-x-0 opacity-100' : '-translate-x-6 opacity-0'">
                <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                    Tentang kami
                </p>
                <h2 class="mb-5 text-3xl font-bold text-white md:text-4xl">
                    Bengkel audio yang mau repot menjelaskan
                </h2>

                <div class="space-y-4 text-base leading-relaxed text-zinc-300">
                    <p>
                        Jenz Audio berdiri di Gading Serpong sejak {{ $jenz['since'] }}. Kami spesialis
                        upgrade audio mobil &mdash; head unit, speaker, subwoofer, peredam, sampai
                        dashcam dan kamera parkir.
                    </p>
                    <p>
                        Yang paling sering disebut pelanggan di ulasan mereka bukan cuma hasil suaranya,
                        tapi karena semua dijelasin dulu sebelum dikerjakan. Mau setup minimalis atau
                        habis-habisan, kami sesuaikan sama budget Anda.
                    </p>
                </div>

                {{-- Poin pembeda --}}
                <ul class="mt-7 space-y-3">
                    @foreach ([
                        'Dicek dan dijelaskan dulu, baru dikerjakan',
                        'Instalasi rapi tanpa potong kabel bodi',
                        'Bisa ditungguin, ruang tunggu nyaman',
                        'Garansi pemasangan & tuning ulang',
                    ] as $poin)
                        <li class="flex items-start gap-3 text-sm text-zinc-300">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            {{ $poin }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach ($stats as $index => $stat)
                    <div class="transform rounded-2xl border border-zinc-800 bg-zinc-950 p-6 text-center transition-all duration-500"
                        :class="seen ? 'translate-y-0 scale-100 opacity-100' : 'translate-y-6 scale-95 opacity-0'"
                        style="transition-delay: {{ $index * 100 }}ms">
                        <div class="mb-1 text-3xl font-bold text-amber-500 md:text-4xl">
                            {{ $stat['angka'] }}
                        </div>
                        <div class="text-sm font-medium text-white">{{ $stat['label'] }}</div>
                        <div class="mt-1 text-xs text-zinc-500">{{ $stat['ket'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
