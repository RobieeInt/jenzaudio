<section id="faq" class="bg-zinc-950 py-20 px-4" x-data="faqSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-4xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Pertanyaan Umum
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Temukan jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>

        {{-- FAQ List --}}
        <div class="space-y-4">
            <template x-for="(faq, index) in faqs" :key="faq.id">
                <div class="overflow-hidden rounded-lg border border-zinc-800 bg-zinc-900 px-6 transform transition-all duration-500 hover:border-amber-500/50"
                    :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                    :style="{ 'transition-delay': (index * 100) + 'ms' }">
                    {{-- Trigger --}}
                    <button type="button"
                        class="flex w-full items-center justify-between py-6 text-left text-lg font-semibold text-white hover:text-amber-500"
                        @click="toggle(faq.id)">
                        <span x-text="faq.question"></span>
                        <span
                            class="ml-4 flex h-7 w-7 items-center justify-center rounded-full border border-zinc-700 bg-zinc-800"
                            :class="isOpen(faq.id) ? 'border-amber-500 bg-amber-500/10' : ''">
                            {{-- Chevron --}}
                            <svg class="h-4 w-4 text-zinc-300 transition-transform duration-300"
                                :class="isOpen(faq.id) ? 'rotate-180 text-amber-500' : ''" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>

                    {{-- Content --}}
                    <div x-show="isOpen(faq.id)" x-transition:enter="transition-all duration-300 ease-out"
                        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96"
                        x-transition:leave="transition-all duration-300 ease-in"
                        x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0"
                        class="overflow-hidden pb-6 text-zinc-400 leading-relaxed">
                        <p x-text="faq.answer"></p>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

@php
    // nanti kalau punya tabel faq, tinggal map ke struktur ini
    $faqData = [
        [
            'id' => 1,
            'question' => 'Berapa lama proses pengerjaan pemasangan audio?',
            'answer' =>
                'Tergantung paket dan kondisi mobil, rata-rata 2–6 jam. Untuk paket full upgrade atau custom tertentu bisa lebih lama karena proses tuning dan finishing yang detail.',
        ],
        [
            'id' => 2,
            'question' => 'Apakah bisa konsultasi dulu sebelum pasang?',
            'answer' =>
                'Tentu. Kamu bisa konsultasi dulu via WhatsApp atau datang langsung ke workshop. Kami bantu rekomendasikan paket sesuai kebutuhan dan budget kamu.',
        ],
        [
            'id' => 3,
            'question' => 'Garansi yang diberikan seperti apa?',
            'answer' =>
                'Produk mengikuti garansi resmi pabrik, dan untuk instalasi kami berikan garansi pemasangan selama jangka waktu tertentu. Kalau ada masalah setelah pemasangan, kamu bisa langsung hubungi kami.',
        ],
        [
            'id' => 4,
            'question' => 'Apakah bisa bawa perangkat sendiri untuk dipasang?',
            'answer' =>
                'Bisa, kami melayani jasa instalasi saja. Namun kami tetap akan cek dulu kondisi perangkat untuk memastikan masih layak dipasang.',
        ],
        [
            'id' => 5,
            'question' => 'Apakah harus booking dulu sebelum datang?',
            'answer' =>
                'Sangat disarankan untuk booking jadwal agar waktu tunggu lebih singkat dan tim kami bisa siapkan kebutuhan kamu terlebih dahulu.',
        ],
    ];
@endphp

<script>
    function faqSection() {
        return {
            faqs: @json($faqData),
            isVisible: false,
            openId: null,

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

            toggle(id) {
                this.openId = this.openId === id ? null : id;
            },

            isOpen(id) {
                return this.openId === id;
            },
        }
    }
</script>
