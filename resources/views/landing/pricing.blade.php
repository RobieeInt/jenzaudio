<section id="pricing" class="bg-zinc-950 py-20 px-4" x-data="pricingSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Paket Harga
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Pilih paket yang sesuai dengan kebutuhan dan budget Anda
            </p>
        </div>

        {{-- Pricing grid --}}
        <div class="grid gap-8 md:grid-cols-3">
            <template x-for="(pkg, index) in packages" :key="pkg.id">
                <div class="group relative flex h-full flex-col overflow-hidden border-2 transform transition-all duration-500"
                    :class="[
                        pkg.popular ?
                        'border-amber-500 bg-gradient-to-br from-zinc-900 to-zinc-800 scale-105 md:scale-110' :
                        'border-zinc-800 bg-zinc-900 hover:border-amber-500/50',
                        isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'
                    ]"
                    :style="{ 'transition-delay': (index * 100) + 'ms' }">
                    {{-- Ribbon TERLARIS --}}
                    <template x-if="pkg.popular">
                        <div
                            class="absolute -right-12 top-8 rotate-45 bg-amber-500 px-12 py-1 text-xs font-bold text-zinc-900">
                            TERLARIS
                        </div>
                    </template>

                    {{-- Header --}}
                    <div class="p-6 pb-3">
                        <h3 class="text-2xl font-bold text-white" x-text="pkg.name"></h3>
                        <p class="mt-1 text-sm text-zinc-400" x-text="pkg.description"></p>

                        <div class="pt-4">
                            <div class="flex items-baseline">
                                <span class="text-4xl font-bold text-amber-500">
                                    Rp <span x-text="formatPrice(pkg.price)"></span>
                                </span>
                            </div>
                            <p class="text-sm text-zinc-500 mt-1" x-text="pkg.period"></p>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div class="px-6 pb-4">
                        <ul class="space-y-3">
                            <template x-for="(feature, idx) in pkg.features" :key="idx">
                                <li class="flex items-start">
                                    {{-- Check icon --}}
                                    <svg class="mr-3 mt-0.5 h-5 w-5 flex-shrink-0 text-amber-500" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span class="text-zinc-300" x-text="feature"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    {{-- Footer --}}
                    <div class="mt-auto px-6 pb-6">
                        <button type="button"
                            class="w-full py-3 text-base font-semibold rounded-md transition-all flex items-center justify-center"
                            :class="pkg.popular ?
                                'bg-amber-500 text-zinc-900 hover:bg-amber-400' :
                                'bg-zinc-800 text-white hover:bg-amber-500 hover:text-zinc-900'"
                            @click="openWhatsApp(pkg.name)">
                            Pilih Paket
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <p class="mt-12 text-center text-sm text-zinc-500">
            *Harga dapat berubah sewaktu-waktu. Hubungi kami untuk penawaran terbaik.
        </p>
    </div>
</section>

@php
    // Nomor WA dari contact, fallback ke default
    $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');

    // Kalau nanti mau ambil dari DB, tinggal ganti ini.
    $pricingData = [
        [
            'id' => 1,
            'name' => 'Paket Basic',
            'description' => 'Cocok untuk upgrade audio harian dengan budget hemat.',
            'price' => 1500000,
            'period' => 'Install sekali, tuning dasar.',
            'popular' => false,
            'features' => ['Upgrade speaker depan', 'Instalasi rapi & aman', 'Konsultasi setup audio'],
        ],
        [
            'id' => 2,
            'name' => 'Paket Signature',
            'description' => 'Balance antara kualitas suara dan fitur lengkap.',
            'price' => 3500000,
            'period' => 'Termasuk tuning lanjutan.',
            'popular' => true,
            'features' => [
                'Speaker depan & belakang',
                'Penambahan subwoofer aktif',
                'Tuning detail sesuai selera',
                'Quality check keseluruhan sistem',
            ],
        ],
        [
            'id' => 3,
            'name' => 'Paket Premium',
            'description' => 'Untuk pecinta audio yang ingin hasil maksimal.',
            'price' => 7500000,
            'period' => 'Full upgrade + fine tuning.',
            'popular' => false,
            'features' => [
                'Full sistem audio upgrade',
                'Opsional DSP & konfigurasi staging',
                'Tuning profesional berulang',
                'After sales support & konsultasi',
            ],
        ],
    ];
@endphp

<script>
    function pricingSection() {
        return {
            packages: @json($pricingData),
            waPhone: @json($waPhone),
            isVisible: false,

            init() {
                const observer = new IntersectionObserver(
                    ([entry]) => {
                        if (entry.isIntersecting) {
                            this.isVisible = true;
                            observer.disconnect();
                        }
                    }, {
                        threshold: 0.1
                    }
                );

                if (this.$refs.section) {
                    observer.observe(this.$refs.section);
                }
            },

            formatPrice(value) {
                if (!value) return '0';
                return Number(value).toLocaleString('id-ID');
            },

            openWhatsApp(packageName) {
                const message = 'Halo, saya tertarik dengan ' + packageName + '. Bisa konsultasi?';
                const url = 'https://wa.me/' + this.waPhone + '?text=' + encodeURIComponent(message);
                window.open(url, '_blank');
            },
        }
    }
</script>
