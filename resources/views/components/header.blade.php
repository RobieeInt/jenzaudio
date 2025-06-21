<header class="header-with-topbar" style="position: relative; z-index: 10; background-color: white;">
    <!-- start header top bar -->
    <div
        class="header-top-bar top-bar-light bg-white disable-fixed border-bottom border-color-transparent-dark-very-light">
        <div class="container-fluid">
            <div class="row h-45px align-items-center m-0">
                <div class="col-lg-7 col-md-8 text-center text-md-start">
                    <div class="fs-13 text-dark-gray alt-font fw-600">Gratis Biaya Pengiriman <a
                            href="demo-decor-store-shop.html"
                            class="text-dark-gray fw-700 text-decoration-line-bottom">Belanja Sekarang</a></div>
                </div>
                <div class="col-lg-5 col-md-4 text-end d-none d-md-flex">
                    <a href="demo-decor-store-contact.html"
                        class="widget fs-13 text-dark-gray fw-600 me-25px md-me-15px text-dark-gray"><i
                            class="feather icon-feather-phone-call"></i>Customer service</a>
                    <a href="{{ route('contact') }}"
                        class="widget fs-13 text-dark-gray alt-font me-25px fw-600 d-none d-lg-inline-block"><i
                            class="feather icon-feather-map-pin"></i>Find our store</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top bar -->
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg header-light bg-white disable-fixed" data-header-hover="light">
        <div class="container-fluid">
            <div class="col-auto">
                <a class="navbar-brand" href="{{ route('landing-page') }}">
                    <img src="{{ asset('redesign/images/demo-decor-store-logo-black.png') }}"
                        data-at2x="{{ asset('redesign/images/demo-decor-store-logo-black@2x.png') }}" alt=""
                        class="default-logo">
                    <img src="{{ asset('redesign/images/demo-decor-store-logo-black.png') }}"
                        data-at2x="{{ asset('redesign/images/demo-decor-store-logo-black@2x.png') }}" alt=""
                        class="alt-logo">
                    <img src="{{ asset('redesign/images/demo-decor-store-logo-black.png') }}"
                        data-at2x="{{ asset('redesign/images/demo-decor-store-logo-black@2x.png') }}" alt=""
                        class="mobile-logo">
                </a>
            </div>
            <div class="col-auto menu-order position-static xs-ps-0">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav alt-font">
                        <li class="nav-item"><a href="{{ route('landing-page') }}" class="nav-link">Home</a></li>

                        <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Event</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li> --}}
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a>
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-auto ms-auto">

            </div>
        </div>
    </nav>
</header>
