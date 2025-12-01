<section id="portfolio" class="bg-zinc-900 py-20 px-4" x-data="portfolioSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">

        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Portfolio Kami
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Lihat hasil pekerjaan kami di berbagai kategori layanan
            </p>
        </div>

        {{-- Category Filter --}}
        <div class="mb-12 flex flex-wrap justify-center gap-3">
            <template x-for="category in categories" :key="category">
                <button type="button" class="rounded-full px-6 py-2 text-sm font-medium transition-all"
                    :class="selectedCategory === category ?
                        'bg-amber-500 text-zinc-900 scale-105' :
                        'bg-zinc-800 text-zinc-300 hover:bg-zinc-700'"
                    @click="selectedCategory = category" x-text="category"></button>
            </template>
        </div>

        {{-- Portfolio Grid --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <template x-for="(item, index) in filtered()" :key="item.id">
                <a :href="item.link"
                    class="group relative overflow-hidden border border-zinc-800 bg-zinc-950 rounded-xl transform transition-all duration-500 hover:scale-105 hover:border-amber-500"
                    :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    :style="{ 'transition-delay': (index * 100) + 'ms' }">
                    <div class="relative aspect-video overflow-hidden">
                        <img :src="item.image" :alt="item.title"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">

                        {{-- Gradient overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-zinc-900/50 to-transparent opacity-60 transition-opacity group-hover:opacity-80">
                        </div>

                        {{-- Text overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <span
                                class="mb-2 inline-block rounded-full bg-amber-500 px-3 py-1 text-xs font-semibold text-zinc-900"
                                x-text="item.category">
                            </span>

                            <h3 class="mb-2 text-xl font-bold text-white" x-text="item.title"></h3>

                            <p class="text-sm text-zinc-300 line-clamp-2" x-text="item.description"></p>
                        </div>
                    </div>
                </a>
            </template>
        </div>

        {{-- Empty state --}}
        <div class="py-20 text-center" x-show="filtered().length === 0">
            <p class="text-xl text-zinc-500">Belum ada kategori untuk ditampilkan.</p>
        </div>

    </div>
</section>

@php
    // Ambil data dari $category sebagaimana contoh asli
    $portfolioData = collect($category)
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'category' => $item->name, // kategori sama dengan nama
                'description' => \Illuminate\Support\Str::limit($item->description, 80),
                'image' => asset($item->image),
                'link' => route('categorydetail', ['slug' => $item->slug]),
            ];
        })
        ->values()
        ->all();

    // Buat daftar kategori filter
    $categories = array_values(array_unique(array_merge(['All'], array_column($portfolioData, 'category'))));
@endphp

<script>
    function portfolioSection() {
        return {
            items: @json($portfolioData),
            categories: @json($categories),
            selectedCategory: 'All',
            isVisible: false,

            init() {
                const observer = new IntersectionObserver(([entry]) => {
                    if (entry.isIntersecting) {
                        this.isVisible = true;
                        observer.disconnect();
                    }
                }, {
                    threshold: 0.1
                });

                observer.observe(this.$refs.section);
            },

            filtered() {
                if (this.selectedCategory === 'All') return this.items;
                return this.items.filter(i => i.category === this.selectedCategory);
            }
        }
    }
</script>
