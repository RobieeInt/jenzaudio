<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dapur Gemilang</title>
    <meta name="description"
        content="Dapur Gemilang: Ahli dalam Pembuatan Kitchen Set Kustom dengan Keahlian Alumunium dan Bahan Upvc. Ciptakan Ruangan Impian Anda dengan Produk Berkualitas yang Disesuaikan dengan Keinginan dan Gaya Anda.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Dapur Gemilang">
    <meta name="keywords"
        content="Dapur Gemilang, Kitchen Set, Kitchen Set Kustom, Kitchen Set Kustom Jakarta, Kitchen Set Kustom Bekasi, Kitchen Set Kustom Depok, Kitchen Set Kustom Tangerang, Kitchen Set Kustom Bogor, Kitchen Set Kustom Bandung, Kitchen Set Kustom Surabaya, Kitchen Set Kustom Semarang, Kitchen Set Kustom Medan, Kitchen Set Kustom Makassar, Kitchen Set Kustom Bali, Kitchen Set Kustom Manado, Kitchen Set Kustom Pontianak, Kitchen Set Kustom Samarinda, Kitchen Set Kustom Balikpapan, Kitchen Set Kustom Palembang, Kitchen Set Kustom Lampung, Kitchen Set Kustom Batam, Kitchen Set Kustom Pekanbaru, Kitchen Set Kustom Padang, Kitchen Set Kustom Banjarmasin, Kitchen Set Kustom Malang, Kitchen Set Kustom Solo, Kitchen Set Kustom Yogyakarta, Kitchen Set Kustom Surakarta, Kitchen Set Kustom Jambi, Kitchen Set Kustom Cirebon, Kitchen Set Kustom Purwokerto, Kitchen Set Kustom Tasikmalaya, Kitchen Set Kustom Bandar Lampung, Kitchen Set Kustom Bengkulu, Kitchen Set Kustom Jember, Kitchen Set Kustom Kediri, Kitchen Set Kustom Denpasar">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ggm/assets/img/iconggm.ico') }}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('ggm/assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ggm/assets/css/plugins/glightbox.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('ggm/assets/css/vendor/bootstrap.min.css') }}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('ggm/assets/css/style.css') }}">
</head>

<body>

    <!-- Start header area -->
    @include('components.header')
    <!-- End header area -->

    <main class="main__content_wrapper">
        <!-- Start slider section -->
        @include('components.slider')
        <!-- End slider section -->

        <!-- Start shipping section -->
        @include('components.shipping')
        <!-- End shipping section -->

        <!-- Start banner section -->
        {{-- @include('components.banner1') --}}
        <!-- End banner section -->

        <!-- Start banner section -->
        @include('components.banner2')
        <!-- End banner section -->

        <!-- Start product section -->
        @include('components.products')
        <!-- End product section -->

        <!-- Start deals banner section -->
        {{-- @include('components.banner-deals') --}}
        <!-- Start deals banner section -->

        <!-- Start product section -->
        {{-- @include('components.product-popular') --}}
        <!-- End product section -->

        <!-- Start Categories section -->
        @include('components.categories')
        <!-- End Categories section -->

        <!-- Start testimonial section -->
        @include('components.testimonial')
        <!-- End testimonial section -->

        <!-- Start Newsletter banner section -->
        {{-- @include('components.newsletter') --}}
        <!-- End Newsletter banner section -->

        <!-- Start blog section -->
        @include('components.blog')
        <!-- End blog section -->

        <!-- Start instagram section -->
        @include('components.instagram')
        <!-- End instagram section -->

    </main>

    <!-- Start footer section -->
    @include('components.footer')
    <!-- End footer section -->

    @include('components.quickview')


    <!-- Start News letter popup -->
    <div class="newsletter__popup" data-animation="slideInUp">
        <div class="newsletter__popup--inner">
            <button class="newsletter__popup--close__btn" aria-label="search close button">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                    <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                </svg>
            </button>
            <div class="box newsletter__popup--box d-flex align-items-center">
                <div class="newsletter__popup--thumbnail">
                    <img class="newsletter__popup--thumbnail__img display-block"
                        src="assets/img/banner/newsletter-popup-thumb2.png" alt="newsletter-popup-thumb">
                </div>
                <div class="newsletter__popup--box__right">
                    <h2 class="newsletter__popup--title">Join Our Newsletter</h2>
                    <div class="newsletter__popup--content">
                        <label class="newsletter__popup--content--desc">Enter your email address to subscribe our
                            notification of our new post &amp; features by email.</label>
                        <div class="newsletter__popup--subscribe" id="frm_subscribe">
                            <form class="newsletter__popup--subscribe__form">
                                <input class="newsletter__popup--subscribe__input" type="text"
                                    placeholder="Enter you email address here...">
                                <button class="newsletter__popup--subscribe__btn">Subscribe</button>
                            </form>
                            <div class="newsletter__popup--footer">
                                <input type="checkbox" id="newsletter__dont--show">
                                <label class="newsletter__popup--dontshow__again--text"
                                    for="newsletter__dont--show">Don't show this popup again</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End News letter popup -->

    <!-- Scroll top bar -->
    <button class="color-scheme-2" aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg"
            class="ionicon" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                d="M112 244l144-144 144 144M256 120v292" />
        </svg></button>

    <!-- All Script JS Plugins here  -->
    <script src="{{ asset('ggm/assets/js/vendor/popper.js') }}" defer="defer"></script>
    <script src="{{ asset('ggm/assets/js/vendor/bootstrap.min.js') }}" defer="defer"></script>
    <script src="{{ asset('ggm/assets/js/plugins/swiper-bundle.min.js') }}" defer="defer"></script>
    <script src="{{ asset('ggm/assets/js/plugins/glightbox.min.js') }}" defer="defer"></script>

    <!-- Customscript js -->
    <script src="{{ asset('ggm/assets/js/script.js') }}" defer="defer"></script>
    @yield('js')

</body>

</html>
