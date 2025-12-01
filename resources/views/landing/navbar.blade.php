<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled ? 'bg-zinc-950/90 backdrop-blur-md shadow-md' : 'bg-transparent'">

    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('redesign/images/jenzlogobg.png') }}" class="h-10" alt="Jenz Audio">
            {{-- <span class="text-xl font-bold text-white">Jenz Audio</span> --}}
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-8 text-sm font-semibold">
            <a href="#about" class="text-zinc-300 hover:text-amber-500 transition">Tentang</a>
            <a href="#services" class="text-zinc-300 hover:text-amber-500 transition">Layanan</a>
            <a href="#portfolio" class="text-zinc-300 hover:text-amber-500 transition">Portfolio</a>
            <a href="#pricing" class="text-zinc-300 hover:text-amber-500 transition">Harga</a>
            <a href="#contact"
                class="rounded-lg bg-amber-500 px-5 py-2 text-zinc-900 font-semibold hover:bg-amber-400 transition">
                Hubungi Kami
            </a>
        </div>

        {{-- Mobile Toggle --}}
        <button @click="open = !open" class="md:hidden text-white focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition
        class="md:hidden bg-zinc-950/95 backdrop-blur-lg border-t border-zinc-800 px-4 pb-6 space-y-4">

        <a href="#about" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Tentang</a>

        <a href="#services" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Layanan</a>

        <a href="#portfolio" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Portfolio</a>

        <a href="#pricing" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Harga</a>

        <a href="#contact" @click="open=false"
            class="block rounded-lg bg-amber-500 px-5 py-2 text-center font-semibold text-zinc-900 hover:bg-amber-400">
            Hubungi Kami
        </a>
    </div>
</nav>
