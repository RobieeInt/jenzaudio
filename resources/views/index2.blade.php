<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Jenz Audio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jenz Audio">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="Jenz Audio adalah spesialis audio mobil yang siap bantu kamu wujudkan kualitas suara impian di kendaraan kesayangan. Kami menyediakan layanan custom audio, instalasi sistem audio mobil, serta menjual berbagai perangkat dan aksesoris audio berkualitas tinggi untuk kamu para car enthusiast.">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">

    {{-- Tailwind / Vite --}}
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

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
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

    <!-- Google tag (gtag.js) - GA4 + Google Ads -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D9GHSSH4L4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        // GA4
        gtag('config', 'G-D9GHSSH4L4');

        // Google Ads base tag
        gtag('config', 'AW-611713340');

        // Optional: phone conversion config
        gtag('config', 'AW-611713340/OfR6CMzc7ssbELyC2KMC', {
            'phone_conversion_number': '6281617000097'
        });
    </script>

    <!-- Event snippet for Klik keluar conversion -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) !== 'undefined') {
                    window.location = url;
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

<body class="bg-zinc-950 text-white" data-mobile-nav-style="classic">
    <div class="min-h-screen bg-zinc-950">
        @include('landing.navbar')
        @include('landing.hero')
        @include('landing.about')
        @include('landing.video')
        @include('landing.services')
        @include('landing.products')
        @include('landing.portfolio')
        @include('landing.pricing')
        @include('landing.testimonials')
        @include('landing.faq')
        @include('landing.contact')
        @include('landing.footer')
    </div>

    {{-- Sticky WhatsApp Button + conversion click --}}
    <a href="https://wa.me/6281617000097?text=Halo%2C%20saya%20mau%20tanya%20dong" class="whatsapp-float"
        target="_blank" aria-label="Chat via WhatsApp" onclick="return gtag_report_conversion(this.href);">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="50" height="50">
        <span class="whatsapp-tooltip">Konsultasiin dulu yu Gratiss</span>
    </a>

    {{-- JS lain kalau ada, via Vite --}}
</body>

</html>
