<section id="about" class="bg-zinc-900 py-20 px-4" x-data="aboutSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-6xl">
        {{-- Heading + deskripsi --}}
        <div class="transform transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-center text-4xl font-bold text-white md:text-5xl">
                {{ $about['title'] ?? 'Tentang Jenz Audio' }}
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="mx-auto mb-16 max-w-3xl text-center text-lg leading-relaxed text-zinc-300">
                {{ $about['description'] ?? 'Spesialis upgrade audio mobil, dari daily driving sampai setup kontes.' }}
            </p>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
            <template x-for="(stat, index) in stats" :key="index">
                <div class="transform text-center transition-all duration-700"
                    :class="isVisible ? 'translate-y-0 opacity-100 scale-100' : 'translate-y-10 opacity-0 scale-90'"
                    :style="{ 'transition-delay': (index * 100) + 'ms' }">
                    <div class="rounded-lg bg-zinc-800 p-6 transition-all hover:bg-zinc-700 hover:scale-105">
                        <div class="mb-2 text-4xl font-bold text-amber-500">
                            <span x-text="displayNumber(index)"></span>
                        </div>
                        <div class="text-sm font-medium text-zinc-400" x-text="stat.label"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

@php
    $stats = $about['stats'] ?? [
        ['number' => '150+', 'label' => 'Proyek Audio'],
        ['number' => '10+', 'label' => 'Tahun Pengalaman'],
        ['number' => '98%', 'label' => 'Kepuasan Pelanggan'],
        ['number' => '24 Jam', 'label' => 'Dukungan Konsultasi'],
    ];
@endphp

<script>
    function aboutSection() {
        return {
            stats: @json($stats),

            isVisible: false,
            animated: [],

            init() {
                this.animated = this.stats.map(() => 0);

                const observer = new IntersectionObserver(
                    (entries) => {
                        if (entries[0].isIntersecting) {
                            this.isVisible = true;
                            this.animateStats();
                            observer.disconnect();
                        }
                    }, {
                        threshold: 0.2
                    }
                );

                if (this.$refs.section) {
                    observer.observe(this.$refs.section);
                }
            },

            animateStats() {
                this.stats.forEach((stat, index) => {
                    const raw = String(stat.number || '').replace(/[^0-9]/g, '');
                    const target = parseInt(raw || '0', 10);
                    const duration = 2000;
                    const steps = 60;
                    const increment = target / steps;
                    let current = 0;

                    if (!target) return;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        this.animated.splice(index, 1, Math.floor(current));
                    }, duration / steps);
                });
            },

            displayNumber(index) {
                if (!this.isVisible) return '0';

                const original = String(this.stats[index]?.number || '');
                const value = this.animated[index] ?? 0;

                if (original.includes('+')) return value + '+';
                if (original.includes('%')) return value + '%';
                if (/[a-zA-Z]/.test(original)) return original; // misal "24/7"

                return value;
            }
        }
    }
</script>
