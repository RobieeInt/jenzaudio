@php
    $jenz = config('jenz');

    //ulasan dari tabel testimonial (lihat database/seeders/TestimonialSeeder.php)
    $testimonialsData = collect($testimonials ?? [])
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'role' => $item->profession,
                'rating' => (int) ($item->star ?: 5),
                'comment' => $item->testimoni,
                'avatar' => $item->image ? asset($item->image) : null,
            ];
        })
        ->values()
        ->all();
@endphp

<section id="testimonials" class="bg-zinc-950 px-4 py-16 md:py-24" x-data="testimonialsSection()"
    x-intersect.once="seen = true">
    <div class="mx-auto max-w-6xl">

        {{-- Heading --}}
        <div class="mb-12 transform text-center transition-all duration-700"
            :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Kata pelanggan
            </p>
            <h2 class="mb-6 text-3xl font-bold text-white md:text-4xl">
                {{ $jenz['google']['reviews'] }} Ulasan, Rating {{ number_format($jenz['google']['rating'], 1, ',', '.') }}
            </h2>

            {{-- Ringkasan rating --}}
            <a href="{{ $jenz['google']['url'] }}" target="_blank" rel="noopener"
                class="inline-flex flex-wrap items-center justify-center gap-x-3 gap-y-2 rounded-2xl border border-zinc-800 bg-zinc-900 px-6 py-4 transition hover:border-amber-500/60">
                <span class="text-4xl font-bold text-amber-500">
                    {{ number_format($jenz['google']['rating'], 1, ',', '.') }}
                </span>
                <span class="flex flex-col items-start">
                    <span class="flex" aria-hidden="true">
                        @for ($s = 0; $s < 5; $s++)
                            <svg class="h-4 w-4 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                            </svg>
                        @endfor
                    </span>
                    <span class="mt-1 text-xs text-zinc-400">
                        {{ $jenz['google']['reviews'] }} ulasan di Google &middot; lihat semua
                    </span>
                </span>
            </a>
        </div>

        @if (count($testimonialsData))
            {{-- Slider ulasan --}}
            <div class="relative transform transition-all duration-700"
                :class="seen ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                @mouseenter="stop()" @mouseleave="start()">

                <div class="grid gap-5 md:grid-cols-3">
                    <template x-for="item in visible()" :key="item.id">
                        <article class="flex h-full flex-col rounded-2xl border border-zinc-800 bg-zinc-900 p-6">
                            {{-- Bintang --}}
                            <div class="mb-4 flex items-center gap-1" aria-hidden="true">
                                <template x-for="n in 5" :key="n">
                                    <svg class="h-4 w-4" :class="n <= item.rating ? 'text-amber-500' : 'text-zinc-700'"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                                    </svg>
                                </template>
                            </div>

                            <p class="mb-6 flex-1 text-sm leading-relaxed text-zinc-300" x-text="item.comment"></p>

                            {{-- Identitas --}}
                            <div class="flex items-center gap-3 border-t border-zinc-800 pt-4">
                                <template x-if="item.avatar">
                                    <img :src="item.avatar" :alt="item.name" loading="lazy"
                                        class="h-10 w-10 rounded-full object-cover">
                                </template>
                                <template x-if="!item.avatar">
                                    <span
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-amber-500/15 text-sm font-bold text-amber-500"
                                        x-text="initials(item.name)"></span>
                                </template>

                                <span class="min-w-0">
                                    <span class="block truncate text-sm font-semibold text-white" x-text="item.name"></span>
                                    <span class="block truncate text-xs text-zinc-500" x-text="item.role"></span>
                                </span>
                            </div>
                        </article>
                    </template>
                </div>

                {{-- Navigasi --}}
                <div class="mt-8 flex items-center justify-center gap-4">
                    <button type="button" @click="prev()"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-700 text-zinc-400 transition hover:border-amber-500 hover:text-amber-500"
                        aria-label="Ulasan sebelumnya">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <span class="text-sm text-zinc-500">
                        <span x-text="page + 1"></span> / <span x-text="totalPages()"></span>
                    </span>

                    <button type="button" @click="next()"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-700 text-zinc-400 transition hover:border-amber-500 hover:text-amber-500"
                        aria-label="Ulasan berikutnya">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            aria-hidden="true">
                            <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        @else
            <div class="rounded-2xl border border-zinc-800 bg-zinc-900 py-16 text-center">
                <p class="text-zinc-400">Ulasan belum ada. Jalankan seeder testimoni dulu.</p>
            </div>
        @endif
    </div>
</section>

<script>
    function testimonialsSection() {
        return {
            items: @json($testimonialsData),
            seen: false,
            page: 0,
            perPage: 3,
            timer: null,

            init() {
                this.perPage = window.innerWidth < 768 ? 1 : 3;

                window.addEventListener('resize', () => {
                    const next = window.innerWidth < 768 ? 1 : 3;
                    if (next !== this.perPage) {
                        this.perPage = next;
                        this.page = 0;
                    }
                });

                this.start();
            },

            totalPages() {
                return Math.max(1, Math.ceil(this.items.length / this.perPage));
            },

            visible() {
                const start = this.page * this.perPage;
                return this.items.slice(start, start + this.perPage);
            },

            next() {
                this.page = (this.page + 1) % this.totalPages();
            },

            prev() {
                this.page = (this.page - 1 + this.totalPages()) % this.totalPages();
            },

            start() {
                this.stop();
                this.timer = setInterval(() => this.next(), 7000);
            },

            stop() {
                if (this.timer) clearInterval(this.timer);
            },

            initials(name) {
                return String(name || '')
                    .trim()
                    .split(/\s+/)
                    .slice(0, 2)
                    .map(w => w[0] || '')
                    .join('')
                    .toUpperCase();
            },
        }
    }
</script>
