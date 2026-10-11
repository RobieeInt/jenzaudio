<section id="video" class="bg-zinc-950 px-4 py-16 md:py-24" x-data="videoSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Lihat langsung
            </p>
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">
                Bengkel &amp; Proses Pengerjaan Kami
            </h2>
            <p class="mx-auto max-w-2xl text-base text-zinc-400 md:text-lg">
                Biar nggak penasaran: ini tempatnya, dan beginilah mobil ditangani.
            </p>
        </div>

        {{-- Video card --}}
        <div class="relative mx-auto max-w-5xl transform transition-all duration-1000"
            :class="isVisible ? 'scale-100 opacity-100' : 'scale-95 opacity-0'">
            <div class="relative overflow-hidden rounded-2xl bg-zinc-900 shadow-2xl">
                {{-- Video container --}}
                <div class="relative aspect-video">
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-zinc-800 to-zinc-900">
                        {{-- #t=1 bikin browser nampilin frame detik ke-1 sebagai poster, ga perlu file gambar --}}
                        <video x-ref="video" class="h-full w-full object-cover" preload="metadata"
                            playsinline @ended="onEnd">
                            <source src="{{ asset('redesign/video/location.mp4') }}#t=1" type="video/mp4" />
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>

                    {{-- Play button overlay --}}
                    <div x-show="!isPlaying" x-transition.opacity
                        class="absolute inset-0 flex items-center justify-center bg-black/40 hover:bg-black/50">
                        <button type="button" @click="handlePlay()"
                            class="group h-20 w-20 rounded-full bg-amber-500 p-0 transition-all hover:bg-amber-400 hover:scale-110 flex items-center justify-center">
                            {{-- Icon Play --}}
                            <svg class="h-10 w-10 fill-zinc-900 text-zinc-900 transition-transform group-hover:scale-110"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="8,5 19,12 8,19" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            {{-- Dekorasi glow --}}
            <div class="pointer-events-none absolute -left-4 -top-4 h-24 w-24 rounded-full bg-amber-500/10 blur-2xl">
            </div>
            <div
                class="pointer-events-none absolute -bottom-4 -right-4 h-32 w-32 rounded-full bg-amber-500/10 blur-2xl">
            </div>
        </div>
    </div>
</section>

<script>
    function videoSection() {
        return {
            isVisible: false,
            isPlaying: false,

            init() {
                const observer = new IntersectionObserver(
                    (entries) => {
                        if (entries[0].isIntersecting) {
                            this.isVisible = true;
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

            handlePlay() {
                const video = this.$refs.video;
                if (!video) return;

                if (this.isPlaying) {
                    video.pause();
                } else {
                    video.play();
                }
                this.isPlaying = !this.isPlaying;
            },

            onEnd() {
                this.isPlaying = false;
            }
        }
    }
</script>
