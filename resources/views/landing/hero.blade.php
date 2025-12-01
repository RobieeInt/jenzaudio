<section id="hero" x-data="heroSection()" x-init="init()" class="relative h-screen w-full overflow-hidden">
    {{-- Background slides --}}
    <template x-for="(img, index) in images" :key="index">
        <div class="absolute inset-0 transition-opacity duration-1000"
            :class="index === i ? 'opacity-100' : 'opacity-0'">
            <div class="absolute inset-0 bg-cover bg-center"
                :style="{
                    backgroundImage: 'url(' + img + ')',
                    transform: 'scale(1.1)'
                }">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900/70 to-zinc-900/90"></div>
        </div>
    </template>

    {{-- Content --}}
    <div class="relative z-10 flex h-full items-center justify-center px-4">
        <div class="max-w-5xl text-center">
            <div class="transform transition-all duration-1000"
                :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
                <h1 class="mb-6 text-6xl font-bold text-white md:text-7xl lg:text-8xl">
                    {{ $hero['title'] ?? 'Jenz Audio' }}
                </h1>

                <p class="mb-4 text-2xl font-semibold text-amber-400 md:text-3xl">
                    {{ $hero['subtitle'] ?? 'Upgrade Audio Mobil Profesional' }}
                </p>

                <p class="mb-10 text-lg text-zinc-300 md:text-xl">
                    {{ $hero['description'] ?? 'Custom audio, instalasi, tuning, dan paket lengkap buat semua jenis mobil.' }}
                </p>

                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <button @click="scrollTo('#contact')"
                        class="group bg-amber-500 px-8 py-6 text-lg font-semibold text-zinc-900 transition-all hover:bg-amber-400 hover:scale-105 flex items-center">
                        Konsultasi Gratis
                        <svg class="ml-2 h-5 w-5 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </button>

                    <button @click="scrollTo('#services')"
                        class="border-2 border-zinc-400 bg-transparent px-8 py-6 text-lg font-semibold text-white transition-all hover:bg-white hover:text-zinc-900">
                        Lihat Layanan
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 z-10 -translate-x-1/2 animate-bounce">
        <div class="flex h-12 w-8 items-start justify-center rounded-full border-2 border-zinc-400 p-2">
            <div class="h-2 w-1 animate-pulse rounded-full bg-amber-400"></div>
        </div>
    </div>
</section>

{{-- Alpine JS logic --}}
<script>
    function heroSection() {
        return {
            // ambil dari controller kalau mau dinamis
            images: @json($hero['images'] ?? [asset('redesign/images/mobil.jpeg'), asset('redesign/images/package1.webp')]),

            i: 0,
            visible: false,

            init() {
                this.visible = true;

                // Auto slide setiap 5 detik
                setInterval(() => {
                    this.i = (this.i + 1) % this.images.length;
                }, 100);
            },

            scrollTo(target) {
                document.querySelector(target)?.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        };
    }
</script>
