<!doctype html>
<html class="no-js" lang="id">
<head>
    <title>@yield('title', 'Jenz Audio — Spesialis Audio Mobil')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Jenz Audio adalah spesialis audio mobil yang siap bantu kamu wujudkan kualitas suara impian di kendaraan kesayangan.')">
    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">
    @stack('head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body { overflow-x: hidden; scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-zinc-950 text-white">

    @include('landing.navbar')

    <main class="pt-[72px]">
        @yield('content')
    </main>

    @include('landing.footer')

    {{-- Sticky WA --}}
    <a href="https://wa.me/6281617000097?text=Halo%2C%20saya%20mau%20tanya%20dong"
        class="fixed bottom-5 right-5 z-[9999] flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] shadow-lg transition hover:scale-110"
        target="_blank" aria-label="Chat WhatsApp">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="36" height="36">
    </a>

    @include('landing.banner')

</body>
</html>
