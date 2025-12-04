<section id="products" class="bg-zinc-900 py-20 px-4" x-data="productsSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Produk Kami
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Produk berkualitas dari brand ternama untuk audio mobil Anda
            </p>
        </div>

        {{-- Category Filter --}}
        <div class="mb-12 flex flex-wrap justify-center gap-3">
            <template x-for="category in categories" :key="category">
                <button type="button" class="rounded-full px-6 py-3 text-sm font-semibold transition-all"
                    :class="selectedCategory === category ?
                        'bg-amber-500 text-zinc-900 scale-105 shadow-lg shadow-amber-500/30' :
                        'bg-zinc-800 text-zinc-300 hover:bg-zinc-700 hover:scale-105'"
                    @click="selectedCategory = category" x-text="category"></button>
            </template>
        </div>

        {{-- Products Grid --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <template x-for="(product, index) in filteredProducts()" :key="product.id">
                <div class="group relative flex h-full flex-col overflow-hidden border border-zinc-800 bg-zinc-950 transform transition-all duration-500 hover:scale-105 hover:border-amber-500"
                    :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                    :style="{ 'transition-delay': (index * 50) + 'ms' }">
                    {{-- Badge --}}
                    <template x-if="product.badge">
                        <div
                            class="absolute right-3 top-3 z-10 rounded-full bg-amber-500 px-3 py-1 text-xs font-semibold text-zinc-900">
                            <span x-text="product.badge"></span>
                        </div>
                    </template>

                    {{-- Image --}}
                    <div class="relative aspect-square overflow-hidden bg-zinc-900">
                        <img :src="product.image" :alt="product.name"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent opacity-60">
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-1 flex-col px-5 pt-4 pb-4">
                        <div class="mb-3 flex items-center justify-between">
                            <span class="rounded-full border border-zinc-700 px-3 py-1 text-xs text-zinc-400">
                                <span x-text="product.brand"></span>
                            </span>
                            <div class="flex items-center text-xs text-zinc-400">
                                {{-- Star icon --}}
                                <svg class="mr-1 h-4 w-4 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                                </svg>
                                <span x-text="product.rating"></span>
                            </div>
                        </div>

                        <h3 class="mb-1 line-clamp-2 text-lg font-semibold text-white">
                            <span x-text="product.name"></span>
                        </h3>
                        <p class="mb-3 line-clamp-2 text-sm text-zinc-400">
                            <span x-text="product.description"></span>
                        </p>
                        {{--
                        <div class="mb-3">
                            <span class="text-2xl font-bold text-amber-500">
                                Rp <span x-text="formatPrice(product.price)"></span>
                            </span>
                            <template x-if="product.originalPrice">
                                <span class="ml-2 text-sm text-zinc-500 line-through">
                                    Rp <span x-text="formatPrice(product.originalPrice)"></span>
                                </span>
                            </template>
                        </div> --}}

                        <template x-if="product.features && product.features.length">
                            <ul class="mb-4 space-y-1 text-xs text-zinc-500">
                                <template x-for="(feature, idx) in product.features.slice(0, 3)" :key="idx">
                                    <li class="flex items-center">
                                        <span class="mr-2 text-amber-500">•</span>
                                        <span x-text="feature"></span>
                                    </li>
                                </template>
                            </ul>
                        </template>

                        <div class="mt-auto pt-2">
                            <button type="button"
                                class="flex w-full items-center justify-center rounded-md bg-zinc-800 px-4 py-2 text-sm font-semibold text-white transition-all hover:bg-amber-500 hover:text-zinc-900"
                                @click="openWhatsApp(product.name)">
                                {{-- Cart icon --}}
                                <svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 12.39A2 2 0 0 0 9.62 15h9.76a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span>Tanya Produk</span>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Empty state --}}
        <div class="py-16 text-center" x-show="filteredProducts().length === 0">
            <p class="text-xl text-zinc-500">Tidak ada produk di kategori ini.</p>
        </div>
    </div>
</section>

@php
    // nomor WA
    $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');

    $collection = isset($productsPopular) ? collect($productsPopular) : collect();

    $productsData = $collection
        ->map(function ($item) {
            /** @var \App\Models\Product $item */
            $image = $item->galleries->first()?->image ?? null;

            return [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'image' => $image ? \Storage::url($image) : asset('redesign/images/default-product.jpg'),
                'price' => (int) ($item->price ?? 0),
                'originalPrice' => $item->old_price ? (int) $item->old_price : null,
                'brand' => $item->brand->name ?? 'Jenz Audio',
                'rating' => $item->rating ?? 4.9,
                'category' => $item->category->name ?? 'Lainnya',
                'badge' => $item->badge_label ?? null,
                'description' => $item->short_description ?? '',
                // kalau punya field features sendiri boleh ganti ini
                'features' => $item->features ? explode('|', $item->features) : [],
            ];
        })
        ->values()
        ->all();

    $productCategories = array_values(array_unique(array_column($productsData, 'category')));
    array_unshift($productCategories, 'All');
@endphp

<script>
    function productsSection() {
        return {
            products: @json($productsData),
            categories: @json($productCategories),
            waPhone: @json($waPhone),

            isVisible: false,
            selectedCategory: 'All',

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

            filteredProducts() {
                if (this.selectedCategory === 'All') {
                    return this.products;
                }
                return this.products.filter(p => p.category === this.selectedCategory);
            },

            formatPrice(value) {
                if (!value) return '0';
                return Number(value).toLocaleString('id-ID');
            },

            openWhatsApp(productName) {
                const message = 'Halo, saya tertarik dengan produk ' + productName + '. Bisa info lebih lanjut?';
                const url = 'https://wa.me/' + this.waPhone + '?text=' + encodeURIComponent(message);
                window.open(url, '_blank');
            },
        }
    }
</script>
