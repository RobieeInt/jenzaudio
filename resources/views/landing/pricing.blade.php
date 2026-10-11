<section id="pricing" class="bg-zinc-950 px-4 py-16 md:py-24" x-data="pricingSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">
        {{-- Heading --}}
        <div class="mb-12 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Harga terbuka
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Paket Harga
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Pilih paket sesuai mobil dan budget Anda. Harga di bawah sudah final.
            </p>
        </div>

        {{-- Filter merk mobil --}}
        <template x-if="brands.length > 1">
            <div class="mb-12 flex flex-wrap justify-center gap-3">
                <template x-for="brand in brands" :key="brand">
                    <button type="button" class="rounded-full px-6 py-3 text-sm font-semibold transition-all"
                        :class="selectedBrand === brand ?
                            'bg-amber-500 text-zinc-900 scale-105 shadow-lg shadow-amber-500/30' :
                            'bg-zinc-800 text-zinc-300 hover:bg-zinc-700 hover:scale-105'"
                        @click="selectedBrand = brand" x-text="brand">
                    </button>
                </template>
            </div>
        </template>

        {{-- Pricing grid --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <template x-for="(pkg, index) in filteredPackages()" :key="pkg.id">
                <div class="group relative flex h-full flex-col overflow-hidden border-2 transform transition-all duration-500"
                    :class="[
                        pkg.popular ?
                        'border-amber-500 bg-gradient-to-br from-zinc-900 to-zinc-800' :
                        'border-zinc-800 bg-zinc-900 hover:border-amber-500/50',
                        isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'
                    ]"
                    :style="{ 'transition-delay': (index * 100) + 'ms' }">
                    {{-- Ribbon TERLARIS --}}
                    <template x-if="pkg.popular">
                        <div
                            class="absolute -right-12 top-8 z-20 rotate-45 bg-amber-500 px-12 py-1 text-xs font-bold text-zinc-900">
                            TERLARIS
                        </div>
                    </template>

                    {{-- Foto paket --}}
                    <a :href="pkg.url" class="relative block aspect-[4/3] overflow-hidden bg-zinc-950">
                        <img :src="pkg.image" :alt="pkg.name" loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent opacity-70">
                        </div>

                        {{-- Badge hemat --}}
                        <template x-if="pkg.discountPercent > 0">
                            <div class="absolute left-3 top-3 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">
                                Hemat <span x-text="pkg.discountPercent"></span>%
                            </div>
                        </template>

                        {{-- Badge merk mobil --}}
                        <div class="absolute bottom-3 left-3 rounded-full border border-zinc-700 bg-zinc-950/80 px-3 py-1 text-xs text-zinc-300">
                            <span x-text="pkg.brand"></span>
                        </div>
                    </a>

                    {{-- Header --}}
                    <div class="p-6 pb-3">
                        <h3 class="text-2xl font-bold text-white" x-text="pkg.name"></h3>

                        <template x-if="pkg.carModels">
                            <p class="mt-1 text-xs text-amber-500">
                                Cocok untuk: <span x-text="pkg.carModels"></span>
                            </p>
                        </template>

                        <p class="mt-2 text-sm text-zinc-400" x-text="pkg.description"></p>

                        <div class="pt-4">
                            {{-- Harga normal kecoret kalau ada diskon --}}
                            <template x-if="pkg.hasDiscount">
                                <p class="text-sm text-zinc-500 line-through">
                                    Rp <span x-text="formatPrice(pkg.price)"></span>
                                </p>
                            </template>

                            <div class="flex items-baseline">
                                <template x-if="pkg.finalPrice">
                                    <span class="text-4xl font-bold text-amber-500">
                                        Rp <span x-text="formatPrice(pkg.finalPrice)"></span>
                                    </span>
                                </template>
                                <template x-if="!pkg.finalPrice">
                                    <span class="text-3xl font-bold text-amber-500">Hubungi Kami</span>
                                </template>
                            </div>

                            <template x-if="pkg.duration">
                                <p class="mt-1 text-sm text-zinc-500" x-text="pkg.duration"></p>
                            </template>
                        </div>
                    </div>

                    {{-- Isi paket --}}
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

                        <template x-if="pkg.warranty">
                            <p class="mt-4 inline-flex items-center rounded-full border border-zinc-700 px-3 py-1 text-xs text-zinc-400">
                                <svg class="mr-1.5 h-3.5 w-3.5 text-amber-500" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                <span x-text="pkg.warranty"></span>
                            </p>
                        </template>
                    </div>

                    {{-- Footer --}}
                    <div class="mt-auto space-y-2 px-6 pb-6">
                        <button type="button"
                            class="w-full py-3 text-base font-semibold rounded-md transition-all flex items-center justify-center"
                            :class="pkg.popular ?
                                'bg-amber-500 text-zinc-900 hover:bg-amber-400' :
                                'bg-zinc-800 text-white hover:bg-amber-500 hover:text-zinc-900'"
                            @click="openWhatsApp(pkg)">
                            Pilih Paket
                        </button>

                        <a :href="pkg.url"
                            class="block w-full rounded-md border border-zinc-700 py-2.5 text-center text-sm font-semibold text-zinc-300 transition-all hover:border-amber-500 hover:text-amber-500">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </template>
        </div>

        {{-- Empty state --}}
        <div class="py-16 text-center" x-show="filteredPackages().length === 0">
            <p class="text-xl text-zinc-500">Belum ada paket untuk merk ini.</p>
            <p class="mt-2 text-sm text-zinc-600">Chat kami buat paket custom sesuai mobil Anda.</p>
        </div>

        {{-- Lihat semua paket --}}
        <div class="mt-12 text-center">
            <a href="{{ route('paket') }}"
                class="inline-flex items-center justify-center rounded-xl border border-amber-500 bg-amber-500 px-8 py-4 text-sm font-bold text-zinc-950 shadow-lg shadow-amber-500/25 transition hover:scale-105 hover:bg-amber-400">
                Lihat Semua Paket
            </a>
        </div>

        <p class="mt-10 text-center text-sm text-zinc-500">
            *Harga dapat berubah sewaktu-waktu. Hubungi kami untuk penawaran terbaik.
        </p>
    </div>
</section>

@php
    // Nomor WA dari contact, fallback ke default
    $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');

    // Data paket dari DB (admin > Paket Audio > Paket)
    $pricingData = collect($packages ?? [])
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'url' => route('paketdetail', $item->slug),
                'image' => $item->thumbnail,
                'brand' => $item->brand_name,
                'carModels' => $item->car_models,
                'description' => $item->short_description,
                'price' => (int) $item->price,
                'finalPrice' => $item->final_price,
                'hasDiscount' => $item->has_discount,
                'discountPercent' => $item->discount_percent,
                'warranty' => $item->warranty,
                'duration' => $item->duration,
                'popular' => (int) $item->is_popular === 1,
                'features' => $item->feature_list,
            ];
        })
        ->values()
        ->all();

    // Tab filter: All + merk mobil yang beneran punya paket
    $pricingBrands = array_values(array_unique(array_column($pricingData, 'brand')));
    array_unshift($pricingBrands, 'Semua Merk');
@endphp

<script>
    function pricingSection() {
        return {
            packages: @json($pricingData),
            brands: @json($pricingBrands),
            waPhone: @json($waPhone),
            isVisible: false,
            selectedBrand: 'Semua Merk',

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

            filteredPackages() {
                if (this.selectedBrand === 'Semua Merk') {
                    return this.packages;
                }

                return this.packages.filter(p => p.brand === this.selectedBrand);
            },

            formatPrice(value) {
                if (!value) return '0';
                return Number(value).toLocaleString('id-ID');
            },

            openWhatsApp(pkg) {
                const message = 'Halo, saya tertarik dengan ' + pkg.name + ' untuk mobil ' + pkg.brand +
                    '. Bisa konsultasi?';
                const url = 'https://wa.me/' + this.waPhone + '?text=' + encodeURIComponent(message);

                if (typeof gtag_report_conversion === 'function') {
                    return gtag_report_conversion(url);
                }

                window.open(url, '_blank');
            },
        }
    }
</script>
