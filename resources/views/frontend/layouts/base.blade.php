<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>GGM Redesign Web</title>
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
    <div id="cookies-model" class="cookie-message bg-dark-gray border-radius-8px">
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
    </div>
    <!-- end cookie message -->
    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="{{ asset('redesign/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('redesign/js/vendors.min.js') }}"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA56KqSJ11nQUw_tXgXyNMiPmQeM7EaSA&callback=initMap"></script>
    <script type="text/javascript" src="{{ asset('redesign/js/main.js') }}"></script>
</body>

</html>
