<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>@yield('title', 'Jenz Audio')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jenz Audio">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Jenz Audio adalah spesialis audio mobil: custom audio, instalasi sistem audio mobil, dan paket upgrade audio.')">
    @stack('head')

    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #18181b;
        }

        ::-webkit-scrollbar-thumb {
            background: #f59e0b;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #d97706;
        }

        ::selection {
            background-color: #f59e0b;
            color: #18181b;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #25D366;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        .whatsapp-float img {
            display: block;
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 60px;
            background-color: #25D366;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            white-space: nowrap;
            opacity: 0;
            transform: translateY(5px);
            transition: all 0.3s ease;
            font-size: 14px;
            pointer-events: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-float:hover .whatsapp-tooltip {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 576px) {
            .whatsapp-tooltip {
                display: none;
            }
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D9GHSSH4L4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-D9GHSSH4L4');
        gtag('config', 'AW-611713340');

        gtag('config', 'AW-611713340/OfR6CMzc7ssbELyC2KMC', {
            'phone_conversion_number': '6281617000097'
        });

        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) !== 'undefined') {
                    window.open(url, '_blank');
                }
            };

            gtag('event', 'conversion', {
                'send_to': 'AW-611713340/nq18CJKI8ssbELyC2KMC',
                'value': 1.0,
                'currency': 'IDR',
                'event_callback': callback
            });

            return false;
        }
    </script>
</head>
<body class="bg-zinc-950 text-white overflow-x-hidden" data-mobile-nav-style="classic">
    @php
        $waPhone = preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097');
    @endphp

    <div class="min-h-screen bg-zinc-950">
        @include('landing.navbar')

        <main>
            @yield('content')
        </main>

        @include('landing.footer')
    </div>

    {{-- Sticky WhatsApp Button --}}
    <a href="https://wa.me/{{ $waPhone }}?text=Halo%2C%20saya%20mau%20tanya%20dong"
        class="whatsapp-float"
        target="_blank"
        aria-label="Chat via WhatsApp"
        onclick="return gtag_report_conversion(this.href);">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="50" height="50">
        <span class="whatsapp-tooltip">Konsultasiin dulu yu Gratis</span>
    </a>

    @stack('scripts')
</body>

</html>
