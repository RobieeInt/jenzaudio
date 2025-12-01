<footer class="bg-zinc-950 pt-16 pb-8" x-data="{ year: new Date().getFullYear() }">
    <div class="mx-auto max-w-7xl px-4">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div>
                <h3 class="mb-4 text-2xl font-bold text-amber-500">Jenz Audio</h3>
                <p class="mb-6 text-sm leading-relaxed text-zinc-400">
                    Solusi lengkap untuk audio dan aksesori mobil premium.
                    Wujudkan mobil impian yang nyaman dan berkelas.
                </p>

                <div class="flex gap-3">
                    {{-- Facebook --}}
                    <a href="#"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-zinc-900 text-zinc-400 transition-all hover:bg-amber-500 hover:text-zinc-900 hover:scale-110"
                        aria-label="Facebook">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.6l-.4 3h-2.2v7A10 10 0 0022 12" />
                        </svg>
                    </a>

                    {{-- Instagram --}}
                    <a href="#"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-zinc-900 text-zinc-400 transition-all hover:bg-amber-500 hover:text-zinc-900 hover:scale-110"
                        aria-label="Instagram">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" />
                            <circle cx="12" cy="12" r="3.5" />
                            <circle cx="17.5" cy="6.5" r="1.2" fill="currentColor" />
                        </svg>
                    </a>

                    {{-- Twitter --}}
                    <a href="#"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-zinc-900 text-zinc-400 transition-all hover:bg-amber-500 hover:text-zinc-900 hover:scale-110"
                        aria-label="Twitter">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.1 1.1A4.48 4.48 0 0016 2a4.48 4.48 0 00-4.4 5.5A12.94 12.94 0 013 3s-4 9 5 13a13.1 13.1 0 01-8 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.1-1A7.72 7.72 0 0023 3z" />
                        </svg>
                    </a>

                    {{-- YouTube --}}
                    <a href="#"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-zinc-900 text-zinc-400 transition-all hover:bg-amber-500 hover:text-zinc-900 hover:scale-110"
                        aria-label="YouTube">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M21.8 8s-.2-1.5-.8-2.1c-.7-.8-1.5-.8-1.9-.9C16.5 4.7 12 4.7 12 4.7h0s-4.5 0-7.1.3c-.4 0-1.2.1-1.9.9-.6.6-.8 2.1-.8 2.1S2 9.6 2 11.2v1.6c0 1.6.2 3.2.2 3.2s.2 1.5.8 2.1c.7.8 1.6.8 2 .9 1.5.1 6.9.3 6.9.3s4.5 0 7.1-.3c.4 0 1.2-.1 1.9-.9.6-.6.8-2.1.8-2.1s.2-1.6.2-3.2v-1.6C22 9.6 21.8 8 21.8 8zM10 14.7V8.7l5.2 3-5.2 3z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="mb-4 text-lg font-semibold text-white">Link Cepat</h4>
                <ul class="space-y-3">
                    <li><a href="#about" class="text-sm text-zinc-400 hover:text-amber-500">Tentang Kami</a></li>
                    <li><a href="#services" class="text-sm text-zinc-400 hover:text-amber-500">Layanan</a></li>
                    <li><a href="#portfolio" class="text-sm text-zinc-400 hover:text-amber-500">Portfolio</a></li>
                    <li><a href="#pricing" class="text-sm text-zinc-400 hover:text-amber-500">Harga</a></li>
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="mb-4 text-lg font-semibold text-white">Layanan</h4>
                <ul class="space-y-3">
                    <li><a href="#services" class="text-sm text-zinc-400 hover:text-amber-500">Audio Mobil</a></li>
                    <li><a href="#services" class="text-sm text-zinc-400 hover:text-amber-500">Head Unit</a></li>
                    <li><a href="#services" class="text-sm text-zinc-400 hover:text-amber-500">Peredam Suara</a></li>
                    <li><a href="#services" class="text-sm text-zinc-400 hover:text-amber-500">Aksesori Interior</a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="mb-4 text-lg font-semibold text-white">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start text-sm text-zinc-400">
                        <svg class="mr-2 mt-0.5 h-5 w-5 text-amber-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">
                            <path
                                d="M12 2a7 7 0 00-7 7c0 4.4 5 9.4 6.4 10.8a1 1 0 001.2 0C14 18.4 19 13.4 19 9a7 7 0 00-7-7z" />
                            <circle cx="12" cy="9" r="2.5" />
                        </svg>
                        <span>Jl. Audio Specialist No. 123, Jakarta Selatan</span>
                    </li>

                    <li class="flex items-center text-sm text-zinc-400">
                        <svg class="mr-2 h-5 w-5 text-amber-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">
                            <path
                                d="M3 5a2 2 0 012-2h2.2a1 1 0 01.96.73l1.1 4.08a1 1 0 01-.27.97l-1.6 1.6a12 12 0 005.4 5.4l1.6-1.6a1 1 0 01.97-.27l4.08 1.1a1 1 0 01.73.96V19a2 2 0 01-2 2h-1A16 16 0 013 6V5z" />
                        </svg>
                        <span>+62 812-3456-7890</span>
                    </li>

                    <li class="flex items-center text-sm text-zinc-400">
                        <svg class="mr-2 h-5 w-5 text-amber-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path d="M3 7l9 6 9-6" />
                        </svg>
                        <span>info@jenzaudio.com</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- copyright --}}
        <div class="mt-12 border-t border-zinc-800 pt-8">
            <p class="text-center text-sm text-zinc-500">
                © <span x-text="year"></span> Jenz Audio. All rights reserved.
                Dibuat dengan ♥ untuk pengalaman audio terbaik.
            </p>
        </div>
    </div>
</footer>
