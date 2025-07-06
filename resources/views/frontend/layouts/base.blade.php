<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Jenz Audio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('redesign/images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{ asset('redesign/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('redesign/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('redesign/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('redesign/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('redesign/demos/decor-store/decor-store.css') }}" />
</head>

<body data-mobile-nav-style="classic">
    <!-- start header -->
    @include('components.header')
    <!-- end header -->
    @yield('content')
    <!-- start footer -->
    @include('components.footer')
    <!-- end footer -->
    <!-- start cookie message -->
    {{-- <div id="cookies-model" class="cookie-message bg-dark-gray border-radius-8px">
        <div class="cookie-description fs-14 text-white mb-20px lh-22">We use cookies to enhance your browsing
            experience, serve personalized ads or content, and analyze our traffic. By clicking "Allow cookies" you
            consent to our use of cookies. </div>
        <div class="cookie-btn">
            <a href="#"
                class="btn btn-transparent-white border-1 border-color-transparent-white-light btn-very-small btn-switch-text btn-rounded w-100 mb-15px"
                aria-label="btn">
                <span>
                    <span class="btn-double-text" data-text="Cookie policy">Cookie policy</span>
                </span>
            </a>
            <a href="#"
                class="btn btn-white btn-very-small btn-switch-text btn-box-shadow accept_cookies_btn btn-rounded w-100"
                data-accept-btn aria-label="text">
                <span>
                    <span class="btn-double-text" data-text="Allow cookies">Allow cookies</span>
                </span>
            </a>
        </div>
    </div> --}}
    <!-- end cookie message -->
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- Sticky WhatsApp Button -->
    <a href="https://wa.me/628568780192?text=Halo%2C%20saya%20mau%20tanya%20dong" class="whatsapp-float" target="_blank"
        aria-label="Chat via WhatsApp">
        <img src="{{ asset('redesign/images/whatsappicon.webp') }}" alt="WhatsApp" width="50" height="50">
        <span class="whatsapp-tooltip">Konsultasiin dulu yu Gratiss</span>
    </a>

    <style>
        /* body {
            background-color: black !important;
            color: white;
        } */

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

    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('redesign/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('redesign/js/vendors.min.js') }}"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA56KqSJ11nQUw_tXgXyNMiPmQeM7EaSA&callback=initMap"></script>
    <script type="text/javascript" src="{{ asset('redesign/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
