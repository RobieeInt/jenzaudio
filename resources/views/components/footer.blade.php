    <footer class="footer-dark bg-dark-gray pb-0 pt-0 cover-background"
        style="background-image:url('images/demo-decor-store-footer-bg.jpg')">
        <div class="container pt-4 pb-4 md-pt-45px md-pb-45px">
            <div class="row justify-content-center">
                <!-- start footer column -->
                <div class="col-6 col-lg-3 last-paragraph-no-margin order-sm-1 md-mb-50px xs-mb-30px">
                    <a href="{{ route('landing-page') }}" class="footer-logo mb-15px d-inline-block"><img
                            src="images/demo-decor-store-logo-white.png"
                            data-at2x="images/demo-decor-store-logo-white@2x.png" alt=""></a>
                    <p class="w-80 sm-w-100">Jenz Audio Tuning Your Drive with Perfect Sound .</p>
                    <div class="elements-social social-icon-style-02 mt-15px">
                        <ul class="small-icon light">
                            <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i
                                        class="fa-brands fa-dribbble"></i></a></li>
                            <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                        class="fa-brands fa-twitter"></i></a></li>
                            <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="fs-16 alt-font fw-500 d-block text-white mb-5px">Categories</span>
                    <ul>
                        @foreach ($categoryfooter as $item)
                            <li>
                                <a href="{{ route('categorydetail', ['slug' => $item->slug]) }}">
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="fs-16 alt-font fw-500 d-block text-white mb-5px">Information</span>
                    <ul>
                        <li><a href="demo-decor-store-about.html">About us</a></li>
                        <li><a href="demo-decor-store-contact.html">Contact us</a></li>
                        <li><a href="demo-decor-store-faq.html">FAQs</a></li>
                        <li><a href="demo-decor-store-faq.html">Payment</a></li>
                    </ul>
                </div>
                <!-- end footer column -->
                <!-- start footer column -->
                {{-- <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                    <span class="fs-16 alt-font fw-500 d-block text-white mb-5px">Account</span>
                    <ul>
                        <li><a href="demo-decor-store-account.html">My account</a></li>
                        <li><a href="demo-decor-store-cart.html">Orders</a></li>
                        <li><a href="demo-decor-store-checkout.html">Checkout</a></li>
                        <li><a href="#">My wishlists</a></li>
                    </ul>
                </div> --}}
                <!-- end footer column -->
                <!-- start footer column -->
                <div class="col-lg-3 col-sm-6 ps-20px sm-ps-15px md-mb-50px xs-mb-0 order-sm-2 order-lg-5">
                    <span class="fs-16 alt-font fw-500 d-block text-white mb-5px">Chat via WhatsApp</span>
                    <div class="mb-20px">Tulis pesanmu dan langsung terhubung dengan tim Jenz Audio!</div>

                    <div class="d-inline-block w-100 newsletter-style-02 position-relative mb-15px">
                        <div class="position-relative w-100">
                            <input id="waMessageInput"
                                class="bg-blue-tangaroa border-color-transparent-white-light w-100 form-control pe-50px ps-20px lg-ps-15px required"
                                type="text" placeholder="Tulis pesan di sini..." />

                            <button type="button" class="btn pe-20px submit position-absolute top-0 end-0 h-100"
                                aria-label="submit"
                                onclick="
                var msg = document.getElementById('waMessageInput').value;
                if (!msg.trim()) {
                    alert('Pesan tidak boleh kosong!');
                    return;
                }
                var phone = '{{ preg_replace('/[^0-9]/', '', $contact->phone ?? '6281617000097') }}';
                var waUrl = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(msg);
                window.open(waUrl, '_blank');
            ">
                                <i class="icon feather icon-feather-mail icon-small text-white"></i>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="footer-card">
                        <a href="#" class="d-inline-block me-5px align-middle"><img
                                src="https://placehold.co/55x20" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img
                                src="https://placehold.co/55x20" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img
                                src="https://placehold.co/55x20" alt=""></a>
                        <a href="#" class="d-inline-block me-5px align-middle"><img
                                src="https://placehold.co/55x20" alt=""></a>
                    </div> --}}
                </div>
                <!-- end footer column -->
            </div>
        </div>
        <div class="border-top border-color-transparent-white-light pt-30px pb-30px">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div
                        class="col-xl-8 last-paragraph-no-margin text-center text-xl-start lg-mt-20px order-3 order-xl-1">
                        <p class="fs-14 mb-0 w-90 xl-w-100">This site is protected by reCAPTCHA and the Google <a
                                href="#" class="text-white text-decoration-line-bottom">privacy policy</a> and
                            terms of service apply.</p>
                        <p class="fs-14 w-90 xl-w-100">&copy; 2024 <a href="#" target="_blank"
                                class="text-white text-decoration-line-bottom">Yujang</a></p>
                    </div>
                    <div class="col-6 col-xl-2 col-md-3 col-sm-5 text-center text-xl-start order-1 order-xl-2">
                        <span class="lh-26 alt-font d-block">Need support?</span>
                        <a href="tel:12345678910" class="fs-16 text-white fw-500">+62 816 1700 0097</a>
                    </div>
                    <div class="col-6 col-xl-2 col-md-3 col-sm-5 text-center text-xl-start order-2 order-xl-3">
                        <span class="lh-26 alt-font d-block">Customer care</span>
                        <a href="mailto:info@jenzaudiogs.com" class="fs-16 text-white fw-500">info@jenzaudiogs.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
