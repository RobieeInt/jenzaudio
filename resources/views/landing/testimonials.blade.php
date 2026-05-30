<section id="testimonials" class="bg-zinc-900 py-20 px-4 overflow-hidden" x-data="testimonialsSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-5xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Testimoni Pelanggan
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Apa kata mereka yang sudah mempercayakan mobilnya pada Jenz Audio
            </p>
        </div>

        <div class="relative">
            {{-- Slider --}}
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out"
                    :style="{ 'transform': 'translateX(-' + (currentIndex * 100) + '%)' }">
                    <template x-for="testimonial in testimonials" :key="testimonial.id">
                        <div class="w-full flex-shrink-0 px-4">
                            <div class="border border-zinc-800 bg-zinc-950 rounded-2xl shadow-lg">
                                <div class="p-8">
                                    {{-- Stars --}}
                                    <div class="mb-6 flex justify-center">
                                        <template x-for="i in testimonial.rating" :key="i">
                                            <svg class="h-6 w-6 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2l2.9 5.9L21 9.3l-4.5 4.4L17.8 21 12 18.2 6.2 21l1.3-7.3L3 9.3l6.1-1.4L12 2z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <p class="mb-8 text-center text-lg leading-relaxed text-zinc-300">
                                        “<span x-text="testimonial.comment"></span>”
                                    </p>

                                    <div class="flex items-center justify-center">
                                        {{-- Avatar --}}
                                        <template x-if="testimonial.avatar">
                                            <div
                                                class="h-16 w-16 overflow-hidden rounded-full border border-amber-500/60">
                                                <img :src="testimonial.avatar" :alt="testimonial.name"
                                                    class="h-full w-full object-cover">
                                            </div>
                                        </template>

                                        <template x-if="!testimonial.avatar">
                                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-amber-500 text-xl font-bold text-zinc-900"
                                                x-text="testimonial.name.charAt(0)"></div>
                                        </template>

                                        <div class="ml-4 text-left">
                                            <p class="font-semibold text-white" x-text="testimonial.name"></p>
                                            <p class="text-sm text-zinc-400" x-text="testimonial.role"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Navigation buttons --}}
            <button type="button" @click="prev()"
                class="absolute left-0 top-1/2 flex h-10 w-10 -translate-y-1/2 -translate-x-4 items-center justify-center rounded-full border border-zinc-700 bg-zinc-800 text-white shadow-md transition-all hover:bg-amber-500 hover:text-zinc-900">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <button type="button" @click="next()"
                class="absolute right-0 top-1/2 flex h-10 w-10 -translate-y-1/2 translate-x-4 items-center justify-center rounded-full border border-zinc-700 bg-zinc-800 text-white shadow-md transition-all hover:bg-amber-500 hover:text-zinc-900">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            {{-- Dots --}}
            <div class="mt-8 flex justify-center gap-2">
                <template x-for="(t, index) in testimonials" :key="index">
                    <button type="button" class="h-2 rounded-full transition-all"
                        :class="currentIndex === index ? 'w-8 bg-amber-500' : 'w-2 bg-zinc-700 hover:bg-zinc-600'"
                        @click="goTo(index)"></button>
                </template>
            </div>
        </div>
    </div>
</section>

@php
    // kalau nanti punya tabel testimonials, tinggal ganti mapping ini
    $testimonialsData = [
        [
            'id' => 1,
            'name' => 'Andi Pratama',
            'role' => 'Pecinta Audio & Daily Driver',
            'rating' => 5,
            'comment' =>
                'Suara jadi jauh lebih detail, bass ngisi tapi nggak berlebihan. Proses pengerjaan juga rapi dan dijelasin satu-satu.',
            'avatar' => null,
        ],
        [
            'id' => 2,
            'name' => 'Rina Setiawan',
            'role' => 'Pemilik Mobil Keluarga',
            'rating' => 5,
            'comment' =>
                'Anak-anak betah di mobil sekarang, jalan jauh nggak rewel. Tim Jenz Audio sabar banget bantu setting sesuai selera.',
            'avatar' => null,
        ],
        [
            'id' => 3,
            'name' => 'Budi Santoso',
            'role' => 'Pengusaha & Commuter',
            'rating' => 4,
            'comment' =>
                'Harga masih masuk akal dengan hasil sebagus ini. Recommended buat yang pengen upgrade tapi nggak mau ribet.',
            'avatar' => null, // coba tanpa avatar, biar keluar inisial
        ],
    ];
@endphp

<script>
    function testimonialsSection() {
        return {
            testimonials: @json($testimonialsData),
            isVisible: false,
            currentIndex: 0,
            timer: null,

            init() {
                // animasi muncul
                const observer = new IntersectionObserver(([entry]) => {
                    if (entry.isIntersecting) {
                        this.isVisible = true;
                        observer.disconnect();
                    }
                }, {
                    threshold: 0.1
                });

                if (this.$refs.section) {
                    observer.observe(this.$refs.section);
                }

                // auto slide
                this.startAutoSlide();
            },

            startAutoSlide() {
                this.stopAutoSlide();
                this.timer = setInterval(() => {
                    this.next();
                }, 5000);
            },

            stopAutoSlide() {
                if (this.timer) {
                    clearInterval(this.timer);
                    this.timer = null;
                }
            },

            prev() {
                const lastIndex = this.testimonials.length - 1;
                this.currentIndex = this.currentIndex === 0 ? lastIndex : this.currentIndex - 1;
                this.startAutoSlide();
            },

            next() {
                const lastIndex = this.testimonials.length - 1;
                this.currentIndex = this.currentIndex === lastIndex ? 0 : this.currentIndex + 1;
                this.startAutoSlide();
            },

            goTo(index) {
                if (index < 0 || index >= this.testimonials.length) return;
                this.currentIndex = index;
                this.startAutoSlide();
            },
        }
    }
</script>
