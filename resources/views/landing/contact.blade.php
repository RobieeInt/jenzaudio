<section id="contact" class="bg-zinc-900 py-20 px-4" x-data="contactSection()" x-ref="section" x-init="init()">
    <div class="mx-auto max-w-7xl">
        {{-- Heading --}}
        <div class="mb-16 transform text-center transition-all duration-1000"
            :class="isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'">
            <h2 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                Hubungi Kami
            </h2>
            <div class="mx-auto mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="text-lg text-zinc-400">
                Siap untuk upgrade mobil Anda? Hubungi kami sekarang!
            </p>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            {{-- Contact Info Cards --}}
            <div class="space-y-6">
                <template x-for="(info, index) in contactInfo" :key="info.title">
                    <div class="border border-zinc-800 bg-zinc-950 rounded-xl transform transition-all duration-500 hover:scale-105 hover:border-amber-500"
                        :class="isVisible ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'"
                        :style="{ 'transition-delay': (index * 100) + 'ms' }">
                        <div class="flex items-center p-6">
                            <div
                                class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-lg bg-amber-500/10">
                                <span x-html="iconFor(info.icon)" class="text-amber-500"></span>
                            </div>
                            <div class="ml-4">
                                <h3 class="mb-1 font-semibold text-white" x-text="info.title"></h3>
                                <p class="text-zinc-400" x-text="info.content"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Contact Form --}}
            <div class="border border-zinc-800 bg-zinc-950 rounded-xl transform transition-all duration-1000"
                :class="isVisible ? 'translate-x-0 opacity-100' : 'translate-x-10 opacity-0'">
                <div class="p-8">
                    <form @submit.prevent="submitForm" class="space-y-6" novalidate>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-zinc-300">
                                Nama Lengkap
                            </label>
                            <input type="text" x-model="form.name" required placeholder="Masukkan nama Anda"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-900 px-3 py-2 text-sm text-white placeholder:text-zinc-500 focus:border-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-zinc-300">
                                Nomor Telepon
                            </label>
                            <input type="text" x-model="form.phone" required placeholder="08xx-xxxx-xxxx"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-900 px-3 py-2 text-sm text-white placeholder:text-zinc-500 focus:border-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-zinc-300">
                                Email
                            </label>
                            <input type="email" x-model="form.email" required placeholder="email@example.com"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-900 px-3 py-2 text-sm text-white placeholder:text-zinc-500 focus:border-amber-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-zinc-300">
                                Pesan
                            </label>
                            <textarea rows="4" x-model="form.message" required placeholder="Ceritakan kebutuhan Anda..."
                                class="w-full resize-none rounded-md border border-zinc-700 bg-zinc-900 px-3 py-2 text-sm text-white placeholder:text-zinc-500 focus:border-amber-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-md bg-amber-500 py-3 text-base font-semibold text-zinc-900 transition-all hover:bg-amber-400 hover:scale-105"
                            :disabled="loading" :class="loading ? 'opacity-75 cursor-not-allowed' : ''">
                            <span x-text="loading ? 'Mengirim...' : 'Kirim Pesan'"></span>
                            <svg class="ml-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M22 2L11 13" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <p x-show="successMessage" x-text="successMessage" class="text-sm text-emerald-400"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@php
    // kontak utama dari DB kalau ada
    $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');

    $contactInfo = [
        [
            'icon' => 'MapPin',
            'title' => 'Alamat',
            'content' => $contact->address ?? 'Jl. Audio Specialist No. 123, Jakarta Selatan',
        ],
        [
            'icon' => 'Phone',
            'title' => 'Telepon',
            'content' => $contact->phone_display ?? '+62 816-1700-0097',
        ],
        [
            'icon' => 'Mail',
            'title' => 'Email',
            'content' => $contact->email ?? 'info@jenzaudio.com',
        ],
        [
            'icon' => 'Clock',
            'title' => 'Jam Operasional',
            'content' => $contact->operational_hours ?? 'Senin - Sabtu: 09.00 - 18.00 WIB',
        ],
    ];
@endphp

<script>
    function contactSection() {
        return {
            isVisible: false,
            loading: false,
            successMessage: '',
            waPhone: @json($waPhone),
            contactInfo: @json($contactInfo),

            form: {
                name: '',
                phone: '',
                email: '',
                message: '',
            },

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

            iconFor(name) {
                const icons = {
                    MapPin: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" d="M12 2a7 7 0 00-7 7c0 4.4 5 9.4 6.4 10.8a1 1 0 001.2 0C14 18.4 19 13.4 19 9a7 7 0 00-7-7z"/>
                        <circle cx="12" cy="9" r="2.5" />
                    </svg>
                `,
                    Phone: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" d="M3 5a2 2 0 012-2h2.2a1 1 0 01.96.73l1.1 4.08a1 1 0 01-.27.97l-1.6 1.6a12 12 0 005.4 5.4l1.6-1.6a1 1 0 01.97-.27l4.08 1.1a1 1 0 01.73.96V19a2 2 0 01-2 2h-1A16 16 0 013 6V5z"/>
                    </svg>
                `,
                    Mail: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="M3 7l9 6 9-6" />
                    </svg>
                `,
                    Clock: `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 7v5l3 3" />
                    </svg>
                `,
                };

                return icons[name] || '';
            },

            submitForm() {
                if (!this.form.name || !this.form.phone || !this.form.email || !this.form.message) {
                    this.successMessage = 'Mohon lengkapi semua data sebelum mengirim.';
                    return;
                }

                this.loading = true;
                this.successMessage = '';

                const text =
                    'Halo Jenz Audio, saya ' + this.form.name +
                    ' (' + this.form.phone + ', ' + this.form.email + ').%0A%0A' +
                    'Saya ingin konsultasi mengenai:%0A' +
                    this.form.message;

                const url = 'https://wa.me/' + this.waPhone + '?text=' + text;

                // buka WA
                window.open(url, '_blank');

                // reset form
                this.form = {
                    name: '',
                    phone: '',
                    email: '',
                    message: ''
                };
                this.loading = false;
                this.successMessage = 'Terima kasih, kamu akan diarahkan ke WhatsApp untuk melanjutkan percakapan.';
            },
        }
    }
</script>
