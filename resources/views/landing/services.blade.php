<section id="services" class="bg-zinc-950 py-20 px-4" x-data="servicesSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">

        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">Layanan Kami</h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Solusi lengkap untuk semua kebutuhan audio dan aksesori mobil Anda
            </p>
        </div>

        {{-- Service Cards --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <template x-for="(service, index) in services" :key="service.id">
                <div class="group relative overflow-hidden border border-zinc-800 bg-zinc-900 transform transition-all duration-500 hover:scale-105 hover:border-amber-500"
                    :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                    :style="{ 'transition-delay': (index * 60) + 'ms' }" @mouseenter="hoveredCard = service.id"
                    @mouseleave="hoveredCard = null">

                    {{-- Background Image --}}
                    <div class="absolute inset-0 opacity-20 transition-opacity group-hover:opacity-30">
                        <img :src="service.image" class="h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 to-transparent"></div>
                    </div>

                    {{-- Content --}}
                    <div class="relative p-6 pb-4">
                        {{-- ICON BOX --}}
                        <div
                            class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-lg bg-amber-500/10 transition-colors group-hover:bg-amber-500/20">

                            {{-- Inject SVG --}}
                            <span x-html="iconFor(service.icon)" class="text-amber-500"></span>

                        </div>

                        <h3 class="text-xl font-semibold text-white transition-colors group-hover:text-amber-500"
                            x-text="service.title"></h3>
                        <p class="mt-2 text-sm text-zinc-400" x-text="service.description"></p>
                    </div>

                    {{-- Features --}}
                    <div class="relative px-6 pb-6">
                        <template x-for="(feature, idx) in service.features">
                            <span
                                class="mr-2 inline-block rounded-full border border-zinc-700 bg-zinc-800/50 px-3 py-1 text-xs text-zinc-300 transition-all hover:border-amber-500 hover:bg-amber-500/10 hover:text-amber-500"
                                x-text="feature"></span>
                        </template>
                    </div>

                    {{-- Hover Border --}}
                    <div class="pointer-events-none absolute inset-0 border-2 border-amber-500 opacity-0 transition-opacity"
                        :class="hoveredCard === service.id ? 'opacity-100' : ''"></div>
                </div>
            </template>
        </div>
    </div>
</section>

@php
    $servicesData = $services ?? [
        [
            'id' => 1,
            'icon' => 'Music',
            'title' => 'Paket Audio Mobil',
            'description' => 'Sistem audio premium untuk pengalaman mendengarkan musik luar biasa.',
            'image' => asset('redesign/images/jenzaudioword.webp'),
            'features' => ['Speaker Premium', 'Subwoofer', 'Amplifier'],
        ],
        [
            'id' => 2,
            'icon' => 'Smartphone',
            'title' => 'Head Unit & Entertainment',
            'description' => 'Upgrade head unit modern lengkap dengan Android Auto & CarPlay.',
            'image' => asset('redesign/images/jenzaudioword.webp'),
            'features' => ['Android Auto', 'CarPlay', 'Bluetooth'],
        ],
        [
            'id' => 3,
            'icon' => 'Volume2',
            'title' => 'Peredam Suara',
            'description' => 'Kurangi noise dan tingkatkan kualitas audio di kabin.',
            'image' => asset('redesign/images/jenzaudioword.webp'),
            'features' => ['Material Premium', 'Pemasangan Rapi', 'Hasil Maksimal'],
        ],
        [
            'id' => 4,
            'icon' => 'Armchair',
            'title' => 'Sarung Jok & Karpet',
            'description' => 'Custom jok dan karpet dengan berbagai pilihan material.',
            'image' => asset('redesign/images/jenzaudioword.webp'),
            'features' => ['Bahan Berkualitas', 'Desain Custom', 'Tahan Lama'],
        ],
    ];
@endphp

<script>
    function servicesSection() {
        return {
            services: @json($servicesData),
            isVisible: false,
            hoveredCard: null,

            init() {
                const obs = new IntersectionObserver(([entry]) => {
                    if (entry.isIntersecting) {
                        this.isVisible = true;
                        obs.disconnect();
                    }
                }, {
                    threshold: 0.1
                });

                obs.observe(this.$refs.section);
            },

            // --- SVG ICONS MIRIP LUCIde-REACT ---
            iconFor(name) {
                const icons = {
                    Music: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path d="M9 18V5l12-2v13" />
                        <circle cx="6" cy="18" r="3" />
                        <circle cx="18" cy="16" r="3" />
                    </svg>
                `,
                    Smartphone: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
                        <line x1="12" y1="18" x2="12" y2="18"/>
                    </svg>
                `,
                    Volume2: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <polygon points="11 5 6 9 6 15 11 19 11 5" />
                        <path d="M19.07 4.93a10 10 0 0 1 0 14.14"/>
                        <path d="M15.54 8.46a5 5 0 0 1 0 7.07"/>
                    </svg>
                `,
                    Armchair: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path d="M5 12V7a5 5 0 0 1 10 0v5" />
                        <path d="M4 15v2a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4v-2" />
                        <path d="M2 12h20" />
                    </svg>
                `,
                    Shield: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path d="M12 2l7 4v6c0 5-3.8 9-7 10-3.2-1-7-5-7-10V6l7-4z"/>
                    </svg>
                `,
                    Package: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path d="M3 7l9 5 9-5" />
                        <polyline points="3 7 3 17 12 22 21 17 21 7" />
                    </svg>
                `,
                    Sparkles: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3z"/>
                    </svg>
                `,
                };

                return icons[name] || icons['Music'];
            },
        }
    }
</script>
