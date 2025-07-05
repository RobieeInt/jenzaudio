<header class="header-with-topbar" style="position: relative; z-index: 10; background-color: black;">
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg header-light bg-black disable-fixed" data-header-hover="light">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="col-auto">
                <a class="navbar-brand" href="{{ route('landing-page') }}">
                    <img src="{{ asset('redesign/images/jenzlogo.jpeg') }}"
                        data-at2x="{{ asset('redesign/images/jenzlogo.jpeg') }}" alt="" class="default-logo">
                    <img src="{{ asset('redesign/images/jenzlogo.jpeg') }}"
                        data-at2x="{{ asset('redesign/images/jenzlogo.jpeg') }}" alt="" class="alt-logo">
                    <img src="{{ asset('redesign/images/jenzlogo.jpeg') }}"
                        data-at2x="{{ asset('redesign/images/jenzlogo.jpeg') }}" alt="" class="mobile-logo">
                </a>
            </div>

            <!-- Menu -->
            <div class="col-auto menu-order position-static xs-ps-0">
                <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center bg-black" id="navbarNav">
                    <ul class="navbar-nav alt-font text-white">
                        <li class="nav-item"><a href="{{ route('landing-page') }}" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="{{ route('event') }}" class="nav-link">Event</a></li>
                        <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">blog</a></li>
                        {{-- <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li> --}}
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-auto ms-auto">
                {{-- kosongkan kalau tidak ada --}}
            </div>
        </div>
    </nav>
</header>

<style>
    /* Paksa warna teks putih untuk nav-link */
    .navbar-nav .nav-link {
        color: white !important;
    }

    /* Background collapse menu mobile tetap item */
    @media (max-width: 991.98px) {
        #navbarNav {
            background-color: black !important;
            padding: 10px 0;
        }
    }

    /* Optional: warna menu saat di-hover di semua ukuran */
    .navbar-nav .nav-link:hover {
        color: #f8f9fa !important;
    }
</style>
