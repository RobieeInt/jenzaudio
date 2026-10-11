@extends('frontend.layouts.page')

@section('title', ($activeBrand ? 'Paket Audio ' . $activeBrand->name : 'Paket Audio Mobil') . ' - Jenz Audio')

@section('meta_description',
    $activeBrand
        ? 'Daftar paket upgrade audio mobil ' . $activeBrand->name . ' di Jenz Audio, lengkap dengan harga dan isi paketnya.'
        : 'Daftar lengkap paket upgrade audio mobil Jenz Audio per merk mobil, lengkap dengan harga, isi paket, dan garansi.')

@section('content')
    @php
        // section content dirender sebelum body layout, jadi $waPhone disiapin di sini
        $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');
    @endphp

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-zinc-950 px-4 pb-12 pt-32">
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900 via-zinc-950 to-zinc-950"></div>
        <div class="absolute left-1/2 top-24 h-72 w-72 -translate-x-1/2 rounded-full bg-amber-500/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-amber-500">
                Paket Audio Mobil
            </p>
            <h1 class="text-4xl font-bold text-white md:text-5xl">
                {{ $activeBrand ? 'Paket untuk ' . $activeBrand->name : 'Semua Paket Audio' }}
            </h1>
            <div class="mx-auto mt-6 mb-6 h-1 w-24 bg-amber-500"></div>
            <p class="mx-auto max-w-2xl text-lg text-zinc-400">
                Pilih paket sesuai mobil dan budget. Semua instalasi dikerjakan rapi, bisa konsultasi dulu gratis.
            </p>
        </div>
    </section>

    {{-- Filter merk mobil --}}
    <section class="bg-zinc-950 px-4 pb-10">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('paket') }}"
                    class="rounded-full px-6 py-3 text-sm font-semibold transition-all {{ !$activeBrand ? 'bg-amber-500 text-zinc-900 shadow-lg shadow-amber-500/30' : 'bg-zinc-800 text-zinc-300 hover:bg-zinc-700' }}">
                    Semua
                </a>
                @foreach ($carBrands as $brand)
                    <a href="{{ route('paket', ['merk' => $brand->slug]) }}"
                        class="rounded-full px-6 py-3 text-sm font-semibold transition-all {{ $activeBrand && $activeBrand->id === $brand->id ? 'bg-amber-500 text-zinc-900 shadow-lg shadow-amber-500/30' : 'bg-zinc-800 text-zinc-300 hover:bg-zinc-700' }}">
                        {{ $brand->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Grid paket --}}
    <section class="bg-zinc-950 px-4 pb-20">
        <div class="mx-auto max-w-7xl">
            @if ($packages->count())
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($packages as $package)
                        <div
                            class="group relative flex h-full flex-col overflow-hidden border-2 transition-all duration-300 {{ $package->is_popular ? 'border-amber-500 bg-gradient-to-br from-zinc-900 to-zinc-800' : 'border-zinc-800 bg-zinc-900 hover:border-amber-500/50' }}">

                            @if ($package->is_popular)
                                <div
                                    class="absolute -right-12 top-8 z-20 rotate-45 bg-amber-500 px-12 py-1 text-xs font-bold text-zinc-900">
                                    TERLARIS
                                </div>
                            @endif

                            {{-- Foto --}}
                            <a href="{{ route('paketdetail', $package->slug) }}"
                                class="relative block aspect-[4/3] overflow-hidden bg-zinc-950">
                                <img src="{{ $package->thumbnail }}" alt="{{ $package->name }}" loading="lazy"
                                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-transparent opacity-70">
                                </div>

                                @if ($package->has_discount)
                                    <div
                                        class="absolute left-3 top-3 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">
                                        Hemat {{ $package->discount_percent }}%
                                    </div>
                                @endif

                                <div
                                    class="absolute bottom-3 left-3 rounded-full border border-zinc-700 bg-zinc-950/80 px-3 py-1 text-xs text-zinc-300">
                                    {{ $package->brand_name }}
                                </div>
                            </a>

                            {{-- Konten --}}
                            <div class="p-6 pb-3">
                                <h2 class="text-2xl font-bold text-white">
                                    <a href="{{ route('paketdetail', $package->slug) }}"
                                        class="transition hover:text-amber-500">{{ $package->name }}</a>
                                </h2>

                                @if ($package->car_models)
                                    <p class="mt-1 text-xs text-amber-500">Cocok untuk: {{ $package->car_models }}</p>
                                @endif

                                @if ($package->short_description)
                                    <p class="mt-2 text-sm text-zinc-400">{{ $package->short_description }}</p>
                                @endif

                                <div class="pt-4">
                                    @if ($package->has_discount)
                                        <p class="text-sm text-zinc-500 line-through">
                                            Rp {{ number_format($package->price, 0, ',', '.') }}
                                        </p>
                                    @endif

                                    @if ($package->final_price)
                                        <p class="text-4xl font-bold text-amber-500">
                                            Rp {{ number_format($package->final_price, 0, ',', '.') }}
                                        </p>
                                    @else
                                        <p class="text-3xl font-bold text-amber-500">Hubungi Kami</p>
                                    @endif

                                    @if ($package->duration)
                                        <p class="mt-1 text-sm text-zinc-500">{{ $package->duration }}</p>
                                    @endif
                                </div>
                            </div>

                            {{-- Isi paket --}}
                            @if (count($package->feature_list))
                                <div class="px-6 pb-4">
                                    <ul class="space-y-3">
                                        @foreach (array_slice($package->feature_list, 0, 4) as $feature)
                                            <li class="flex items-start">
                                                <svg class="mr-3 mt-0.5 h-5 w-5 flex-shrink-0 text-amber-500"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path d="M5 13l4 4L19 7" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                                <span class="text-zinc-300">{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Footer --}}
                            <div class="mt-auto space-y-2 px-6 pb-6">
                                <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode('Halo, saya tertarik dengan ' . $package->name . ' untuk mobil ' . $package->brand_name . '. Bisa konsultasi?') }}"
                                    target="_blank" onclick="return gtag_report_conversion(this.href);"
                                    class="block w-full rounded-md py-3 text-center text-base font-semibold transition-all {{ $package->is_popular ? 'bg-amber-500 text-zinc-900 hover:bg-amber-400' : 'bg-zinc-800 text-white hover:bg-amber-500 hover:text-zinc-900' }}">
                                    Pilih Paket
                                </a>

                                <a href="{{ route('paketdetail', $package->slug) }}"
                                    class="block w-full rounded-md border border-zinc-700 py-2.5 text-center text-sm font-semibold text-zinc-300 transition-all hover:border-amber-500 hover:text-amber-500">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $packages->links('vendor.pagination.jenz') }}
                </div>
            @else
                <div class="border border-zinc-800 bg-zinc-900 py-20 text-center">
                    <p class="text-xl text-zinc-400">Belum ada paket untuk merk ini.</p>
                    <p class="mt-2 text-sm text-zinc-500">
                        Chat kami aja, nanti dibikinin paket custom sesuai mobil lu.
                    </p>
                    <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode('Halo, saya mau tanya paket audio buat mobil saya') }}"
                        target="_blank" onclick="return gtag_report_conversion(this.href);"
                        class="mt-6 inline-flex items-center justify-center rounded-xl bg-amber-500 px-8 py-4 text-sm font-bold text-zinc-950 transition hover:bg-amber-400">
                        Konsultasi Gratis
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
