<nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled ? 'bg-zinc-950/90 backdrop-blur-md shadow-md' : 'bg-transparent'">

    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('redesign/images/jenzlogobg.png') }}" class="h-10" alt="Jenz Audio">
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-8 text-sm font-semibold">
            <a href="/#about"    onclick="jenzNavTo(event,'#about')"    class="text-zinc-300 hover:text-amber-500 transition">Tentang</a>
            <a href="/#services" onclick="jenzNavTo(event,'#services')" class="text-zinc-300 hover:text-amber-500 transition">Layanan</a>
            <a href="/#portfolio" onclick="jenzNavTo(event,'#portfolio')" class="text-zinc-300 hover:text-amber-500 transition">Portfolio</a>
            <a href="/#pricing"  onclick="jenzNavTo(event,'#pricing')"  class="text-zinc-300 hover:text-amber-500 transition">Harga</a>
            <a href="{{ route('blog') }}"
               class="transition {{ request()->routeIs('blog') || request()->routeIs('blogdetail') ? 'text-amber-500' : 'text-zinc-300 hover:text-amber-500' }}">
                Blog
            </a>
            <a href="https://api.whatsapp.com/send/?phone=6281617000097&text=Halo%2C+saya+mau+tanya+dong&type=phone_number&app_absent=0"
                target="_blank"
                class="rounded-lg bg-amber-500 px-5 py-2 text-zinc-900 font-semibold hover:bg-amber-400 transition flex items-center">
                Hubungi Kami
                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </a>
        </div>

        {{-- Mobile Toggle --}}
        <button @click="open = !open" class="md:hidden text-white focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition
        class="md:hidden bg-zinc-950/95 backdrop-blur-lg border-t border-zinc-800 px-4 pb-6 space-y-4">

        <a href="/#about"    onclick="jenzNavTo(event,'#about')"    @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Tentang</a>
        <a href="/#services" onclick="jenzNavTo(event,'#services')" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Layanan</a>
        <a href="/#portfolio" onclick="jenzNavTo(event,'#portfolio')" @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Portfolio</a>
        <a href="/#pricing"  onclick="jenzNavTo(event,'#pricing')"  @click="open=false" class="block py-2 text-zinc-300 hover:text-amber-400">Harga</a>
        <a href="{{ route('blog') }}" @click="open=false"
           class="block py-2 transition {{ request()->routeIs('blog') || request()->routeIs('blogdetail') ? 'text-amber-500 font-semibold' : 'text-zinc-300 hover:text-amber-400' }}">
            Blog
        </a>

        <a href="https://api.whatsapp.com/send/?phone=6281617000097&text=Halo%2C+saya+mau+tanya+dong&type=phone_number&app_absent=0"
            target="_blank"
            class="rounded-lg bg-amber-500 px-5 py-2 text-zinc-900 font-semibold hover:bg-amber-400 transition flex items-center">
            Hubungi Kami
            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</nav>

<script>
function jenzNavTo(e, hash) {
    if (window.location.pathname === '/' || window.location.pathname === '') {
        e.preventDefault();
        var el = document.querySelector(hash);
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }
    // on other pages: follow href="/#section" normally
}
</script>
