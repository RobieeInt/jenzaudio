<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Jenz Audio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="GGM">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('redesign/images/favicon.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('redesign/images/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('redesign/images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('redesign/images/apple-touch-icon-114x114.png') }}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- slider revolution CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('redesign/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('redesign/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('redesign/revolution/css/navigation.css') }}">
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
    <!-- start section -->
    @include('components.sliderbg')
    <!-- end section -->
    <!-- start section -->
    @include('components.bannerslider')
    <!-- end section -->
    <!-- start section -->
    @include('components.category')
    <!-- start section -->
    @include('components.slider_move')
    <!-- end section -->
    {{-- @include('components.tema') --}}
    @include('components.product')
    @include('components.marketplace')
    <!-- end section -->
    <!-- start section -->
    @include('components.whyus')
    {{-- @include('components.catalog') --}}
    {{-- @include('components.explore') --}}
    <!-- end section -->
    <!-- start section -->
    {{-- @include('components.product_tiny') --}}
    <!-- end section -->
    <!-- start section -->
    {{-- @include('components.article') --}}
    <!-- end section -->
    <!-- start section -->
    {{-- @include('components.box_payment') --}}
    <!-- end section -->
    <!-- start footer -->
    @include('components.footer')
    <!-- end footer -->
    <!-- start cookie message -->

    <!-- end cookie message -->
    <!-- start sticky elements -->
    {{-- @include('components.sticky_element') --}}
    <!-- end sticky elements -->
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
    <!-- slider revolution core javaScript files -->
    <script type="text/javascript" src="{{ asset('redesign/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('redesign/revolution/js/jquery.themepunch.revolution.min.js') }}">
    </script>

    <!-- slider revolution extension scripts. ONLY NEEDED FOR LOCAL TESTING -->
    <!-- <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script> -->

    <!-- Slider Revolution add on files -->
    <script type='text/javascript'
        src='{{ asset('redesign/revolution/revolution-addons/particles/js/revolution.addon.particles.min.js?ver=1.0.3') }}'>
    </script>
    <!-- Slider's main "init" script -->
    <script type="text/javascript">
        /* https://learn.jquery.com/using-jquery-core/document-ready/ */
        jQuery(document).ready(function() {
            /* initialize the slider based on the Slider's ID attribute from the wrapper above */
            jQuery('#decor-store-slider').show().revolution({
                sliderType: "standard",
                /* sets the Slider's default timeline */
                delay: 9000,
                /* options are 'auto', 'fullwidth' or 'fullscreen' */
                sliderLayout: 'fullscreen',
                /* RESPECT ASPECT RATIO */
                autoHeight: 'off',
                /* options that disable autoplay */
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        touchOnDesktop: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: true
                    },
                    arrows: {

                        enable: false,
                        style: 'uranus',
                        rtl: false,
                        hide_onleave: false,
                        hide_onmobile: false,
                        hide_under: 0,
                        hide_over: 778,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        left: {
                            container: 'slider',
                            h_align: 'left',
                            v_align: 'center',
                            h_offset: 10,
                            v_offset: 10
                        },
                        right: {
                            container: 'slider',
                            h_align: 'right',
                            v_align: 'center',
                            h_offset: 10,
                            v_offset: 10
                        }

                    }

                },
                /* Lazy Load options are "all", "smart", "single" and "none" */
                lazyType: "smart",
                spinner: "spinner0",
                /* DISABLE FORCE FULL-WIDTH */
                fullScreenAlignForce: 'off',
                hideThumbsOnMobile: 'off',
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                responsiveLevels: [1240, 1024, 778, 480],
                /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                gridwidth: [1220, 1024, 778, 480],
                /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                gridheight: [900, 1000, 960, 720],
                /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                visibilityLevels: [1240, 1024, 1024, 480],
                fallbacks: {
                    simplifyAll: 'on',
                    nextSlideOnWindowFocus: 'off',
                    disableFocusListener: false
                },
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('redesign/js/main.js') }}"></script>
</body>

</html>
