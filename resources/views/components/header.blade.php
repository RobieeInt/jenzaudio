    <header class="header-with-topbar">
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
                        {{-- <div class="header-language-icon widget fs-13 alt-font fw-600">
                            <div class="header-language dropdown">
                                <a href="javascript:void(0);" class="text-dark-gray"><i
                                        class="feather icon-feather-globe"></i>English</a>
                                <ul class="language-dropdown alt-font">
                                    <li><a href="javascript:void(0);" title="English"><span class="icon-country"><img
                                                    src="images/country-flag-16X16/usa.png" alt=""
                                                    data-no-retina=""></span>English</a></li>
                                    <li><a href="javascript:void(0);" title="France"><span class="icon-country"><img
                                                    src="images/country-flag-16X16/france.png" alt=""
                                                    data-no-retina=""></span>France</a></li>
                                    <li><a href="javascript:void(0);" title="Russian"><span class="icon-country"><img
                                                    src="images/country-flag-16X16/russian.png" alt=""
                                                    data-no-retina=""></span>Russian</a></li>
                                    <li><a href="javascript:void(0);" title="Spain"><span class="icon-country"><img
                                                    src="images/country-flag-16X16/spain.png" alt=""
                                                    data-no-retina=""></span>Spain</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end header top bar -->
        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg header-light bg-transparent disable-fixed" data-header-hover="light">
            <div class="container-fluid">
                <div class="col-auto">
                    <a class="navbar-brand" href="demo-decor-store.html">
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
                            {{-- <li class="nav-item dropdown submenu">
                                <a href="demo-decor-store-shop.html" class="nav-link">Shop<span
                                        class="label bg-base-color text-white text-uppercase border-radius-26px">Hot</span></a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink1"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <div class="dropdown-menu submenu-content" aria-labelledby="navbarDropdownMenuLink1">
                                    <div class="d-lg-flex mega-menu m-auto flex-column">
                                        <div class="row row-cols-1 row-cols-lg-5 mb-60px md-mb-30px sm-mb-20px">
                                            <div class="col">
                                                <ul>
                                                    <li class="sub-title">Furniture</li>
                                                    <li><a href="#">Modern chair</a></li>
                                                    <li><a href="#">Luxurious sofa</a></li>
                                                    <li><a href="#">Sitting tables</a></li>
                                                    <li><a href="#">Century cabinet</a></li>
                                                    <li><a href="#">Wooden stool</a></li>
                                                    <li><a href="#">Dining tabl</a></li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul>
                                                    <li class="sub-title">Lighting</li>
                                                    <li><a href="#">Table lamps</a></li>
                                                    <li><a href="#">Wall lights</a></li>
                                                    <li><a href="#">Ceiling lights</a></li>
                                                    <li><a href="#">Chandeliers</a></li>
                                                    <li><a href="#">Smart lights</a></li>
                                                    <li><a href="#">Outdoor lights</a></li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul>
                                                    <li class="sub-title">Decor</li>
                                                    <li><a href="#">Home decor</a></li>
                                                    <li><a href="#">Kitchen decor</a></li>
                                                    <li><a href="#">Office decor</a></li>
                                                    <li><a href="#">Wooden mirrors</a></li>
                                                    <li><a href="#">Designer clocks</a></li>
                                                    <li><a href="#">Spiritual</a></li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul>
                                                    <li class="sub-title">Cabinetry</li>
                                                    <li><a href="#">Wardrobes</a></li>
                                                    <li><a href="#">Shoe racks</a></li>
                                                    <li><a href="#">Movable</a></li>
                                                    <li><a href="#">Folding storage</a></li>
                                                    <li><a href="#">Wooden units</a></li>
                                                    <li><a href="#">Kids storage</a></li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul>
                                                    <li class="sub-title">Commercial</li>
                                                    <li><a href="#">Hotel furniture</a></li>
                                                    <li><a href="#">Bar furniture</a></li>
                                                    <li><a href="#">School furniture</a></li>
                                                    <li><a href="#">Public furniture</a></li>
                                                    <li><a href="#">Office furniture</a></li>
                                                    <li><a href="#">Lab furniture</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col">
                                                <a href="demo-decor-store-shop.html"><img class="w-100"
                                                        src="https://placehold.co/580x175" alt=""></a>
                                            </div>
                                            <div class="col">
                                                <a href="demo-decor-store-shop.html"><img class="w-100"
                                                        src="https://placehold.co/580x175" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a href="demo-decor-store-collections.html" class="nav-link">Collections</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink2"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <div class="dropdown-menu submenu-content" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="d-lg-flex mega-menu m-auto flex-column">
                                        <div
                                            class="row row-cols-2 row-cols-lg-6 row-cols-sm-3 md-pt-15px align-items-center justify-content-center mb-60px md-mb-30px sm-mb-0">
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Designer
                                                            stool</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Modern chair</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Table lamp</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Home decor</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Ceramic pots</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col md-mb-30px">
                                                <a href="demo-decor-store-collections.html" class="text-center">
                                                    <img src="https://placehold.co/170x165" alt="">
                                                </a>
                                                <a href="demo-decor-store-collections.html"
                                                    class="btn btn-hover-animation text-uppercase-inherit fw-600 ls-0px justify-content-center">
                                                    <span>
                                                        <span class="btn-text text-dark-gray fs-16">Wooden table</span>
                                                        <span class="btn-icon"><i
                                                                class="fa-solid fa-arrow-right m-0"></i></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col">
                                                <a href="demo-decor-store-collections.html"><img
                                                        src="https://placehold.co/580x240" alt=""></a>
                                            </div>
                                            <div class="col">
                                                <a href="demo-decor-store-collections.html"><img
                                                        src="https://placehold.co/580x240" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="javascript:void(0);" class="nav-link">Pages</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink3"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                                    <li><a href="demo-decor-store-about.html">About</a></li>
                                    <li><a href="demo-decor-store-faq.html">FAQs</a></li>
                                    <li><a href="demo-decor-store-wishlist.html">Wishlist</a></li>
                                    <li><a href="demo-decor-store-account.html">Account</a></li>
                                    <li><a href="demo-decor-store-cart.html">Cart</a></li>
                                    <li><a href="demo-decor-store-checkout.html">Checkout</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a>
                            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    {{-- <div class="header-icon">
                        <div class="header-search-icon icon">
                            <a href="javascript:void(0)" class="search-form-icon header-search-form"><i
                                    class="feather icon-feather-search"></i></a>
                            <div class="search-form-wrapper">
                                <button title="Close" type="button" class="search-close alt-font">×</button>
                                <form id="search-form" role="search" method="get" class="search-form bg-white"
                                    action="search-result.html">
                                    <div class="search-form-box">
                                        <h2 class="text-dark-gray text-center mb-7 alt-font fw-700 ls-minus-1px">What
                                            are you looking for?</h2>
                                        <input class="search-input alt-font" id="search-form-input5e219ef164995"
                                            placeholder="Enter your keywords..." name="s" value=""
                                            type="text" autocomplete="off">
                                        <button type="submit" class="search-button">
                                            <i class="feather icon-feather-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="header-cart-icon icon">
                            <div class="header-cart dropdown">
                                <a href="javascript:void(0);"><i class="feather icon-feather-shopping-bag"></i><span
                                        class="cart-count alt-font">2</span></a>
                                <ul class="cart-item-list">
                                    <li class="cart-item align-items-center">
                                        <a href="javascript:void(0);" class="alt-font close">×</a>
                                        <div class="product-image">
                                            <a href="demo-decor-store-single-product.html"><img
                                                    src="https://placehold.co/600x700" class="cart-thumb"
                                                    alt=""></a>
                                        </div>
                                        <div class="product-detail alt-font fw-600">
                                            <a href="demo-decor-store-single-product.html">Table clock</a>
                                            <span class="item-ammount fw-500">1 x $23.00</span>
                                        </div>
                                    </li>
                                    <li class="cart-item align-items-center">
                                        <a href="javascript:void(0);" class="alt-font close">×</a>
                                        <div class="product-image">
                                            <a href="demo-decor-store-single-product.html"><img
                                                    src="https://placehold.co/600x700" class="cart-thumb"
                                                    alt=""></a>
                                        </div>
                                        <div class="product-detail alt-font fw-600">
                                            <a href="demo-decor-store-single-product.html">Ceramic mug</a>
                                            <span class="item-ammount fw-500">2 x $15.00</span>
                                        </div>
                                    </li>
                                    <li class="cart-total">
                                        <div class="alt-font mb-15px"><span class="w-50 fw-500">Subtotal:</span><span
                                                class="w-50 text-end fw-700">$199.99</span></div>
                                        <a href="demo-decor-store-cart.html"
                                            class="btn btn-large btn-transparent-base-color border-color-extra-medium-gray btn-round-edge">View
                                            cart</a>
                                        <a href="demo-decor-store-checkout.html"
                                            class="btn btn-large btn-base-color btn-box-shadow btn-round-edge">Checkout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-text ms-25px md-ms-20px alt-font">
                            <a href="demo-decor-store-account.html" class="fs-17 fw-600"><i
                                    class="feather icon-feather-user d-inline-block d-xl-none"></i><span
                                    class="d-none d-xl-inline-block">My account</span></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </nav>
    </header>
