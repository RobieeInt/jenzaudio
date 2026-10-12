@php
    $jenz = config('jenz');

    /*
    | Foto hasil kerja diambil dari galeri paket (admin > Paket Audio > Paket > Edit > upload foto).
    | Jadi sekali upload, fotonya kepake di halaman paket sekaligus di sini.
    */
    $portfolioData = collect($packages ?? [])
        ->flatMap(function ($package) {
            return $package->galleries->map(function ($gallery) use ($package) {
                return [
                    'id' => 'g' . $gallery->id,
                    'title' => $package->name,
                    'category' => $package->brand_name,
                    'description' => $package->car_models ?: $package->short_description,
                    'image' => \Storage::url($gallery->image),
                    'link' => route('paketdetail', $package->slug),
                ];
            });
        })
        ->values()
        ->all();

    //daftar merk buat filter
    $portfolioCategories = array_values(array_unique(array_column($portfolioData, 'category')));
    array_unshift($portfolioCategories, 'Semua Merk');
@endphp

<section id="portfolio" class="bg-zinc-900 px-4 py-16 md:py-24" x-data="portfolioSection()"
    x-intersect.once="seen = true">
    <div class="mx-auto max-w-7xl">

        {{-- Heading --}}
        <div class="mb-12 transform text-center transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Hasil kerja
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Mobil yang Sudah Kami Tangani
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Foto asli dari bengkel, bukan stok foto. Klik buat lihat paketnya.
            </p>
        </div>

        @if (count($portfolioData))
            {{-- Filter merk --}}
            <template x-if="categories.length > 2">
                <div class="mb-10 flex flex-wrap justify-center gap-3">
                    <template x-for="category in categories" :key="category">
                        <button type="button" class="rounded-full px-5 py-2 text-sm font-semibold transition-all"
                            :class="selected === category ?
                                'bg-amber-500 text-zinc-900' :
                                'bg-zinc-800 text-zinc-300 hover:bg-zinc-700'"
                            @click="selected = category" x-text="category"></button>
                    </template>
                </div>
            </template>

            {{-- Grid --}}
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <template x-for="(item, index) in filtered()" :key="item.id">
                    <a :href="item.link"
                        class="group relative block overflow-hidden rounded-xl border border-zinc-800 bg-zinc-950 transition-all duration-300 hover:border-amber-500">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img :src="item.image" :alt="item.title" loading="lazy"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent">
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 p-5">
                                <span
                                    class="mb-2 inline-block rounded-full bg-amber-500 px-3 py-1 text-xs font-semibold text-zinc-900"
                                    x-text="item.category"></span>

                                <h3 class="text-lg font-bold text-white" x-text="item.title"></h3>

                                <p class="line-clamp-1 text-sm text-zinc-300" x-show="item.description"
                                    x-text="item.description"></p>
                            </div>
                        </div>
                    </a>
                </template>
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('paket') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-zinc-700 px-7 py-3.5 text-sm font-semibold text-zinc-300 transition hover:border-amber-500 hover:text-amber-500">
                    Lihat Semua Paket
                </a>
            </div>
        @else
            {{-- Belum ada foto: arahin ke Instagram biar section ga kosong melompong --}}
            <div class="rounded-2xl border border-zinc-800 bg-zinc-950 px-6 py-14 text-center">
                <p class="mb-2 text-lg text-zinc-300">Foto hasil kerja terbaru ada di Instagram kami.</p>

                <a href="{{ $jenz['social']['instagram'] }}" target="_blank" rel="noopener"
                    class="inline-flex items-center justify-center rounded-xl bg-amber-500 px-7 py-3.5 text-sm font-bold text-zinc-950 transition hover:bg-amber-400">
                    Lihat di Instagram
                </a>
            </div>
        @endif
    </div>
</section>

<script>
    function portfolioSection() {
        return {
            items: @json($portfolioData),
            categories: @json($portfolioCategories),
            selected: 'Semua Merk',
            seen: false,

            filtered() {
                if (this.selected === 'Semua Merk') return this.items;
                return this.items.filter(i => i.category === this.selected);
            },
        }
    }
</script>
