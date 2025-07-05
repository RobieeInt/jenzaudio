@extends('frontend.layouts.base')

@section('title', 'About Us')

@section('content')
    <!-- start page title -->
    <section class="page-title-center-alignment cover-background top-space-padding"
        style="background-image: url(images/demo-decor-store-title-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center position-relative page-title-extra-large">
                    <h1 class="alt-font d-inline-block fw-700 ls-minus-05px text-base-color mb-10px mt-3 md-mt-50px">Detail
                        Produk</h1>
                </div>
                <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                    <ul>
                        <li><a href="{{ route('landing-page') }}">Home</a></li>
                        <li>Detail Produk</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-40px pb-0">
        <div class="container">
            <div class="row">
                <!-- Gambar produk -->
                <div class="col-lg-6 md-mb-40px">
                    <div class="row overflow-hidden position-relative">
                        <div class="col-12 position-relative product-image">
                            <div class="swiper product-image-slider"
                                data-slider-options='{
                                "spaceBetween": 0,
                                "watchOverflow": true,
                                "navigation": {
                                    "nextEl": ".slider-product-next",
                                    "prevEl": ".slider-product-prev"
                                },
                                "thumbs": {
                                    "swiper": {
                                        "el": ".product-image-thumb",
                                        "slidesPerView": "5",
                                        "spaceBetween": 15
                                    }
                                }
                             }'
                                data-swiper-thumb-click="1">
                                <div class="swiper-wrapper">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide gallery-box">
                                            <a href="{{ Storage::url($gallery->image) }}" data-group="lightbox-gallery"
                                                title="{{ $product->name }}">
                                                <img class="w-100" src="{{ Storage::url($gallery->image) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tombol navigasi -->
                            <div
                                class="slider-product-next swiper-button-next border-radius-100 border border-1 border-color-extra-medium-gray">
                                <i class="fa fa-chevron-right text-dark-gray icon-very-small"></i>
                            </div>
                            <div
                                class="slider-product-prev swiper-button-prev border-radius-100 border border-1 border-color-extra-medium-gray">
                                <i class="fa fa-chevron-left text-dark-gray icon-very-small"></i>
                            </div>
                        </div>

                        <!-- Thumbnail bawah -->
                        <div class="col-12 position-relative">
                            <div class="swiper-container product-image-thumb">
                                <div class="swiper-wrapper">
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <img class="w-100" src="{{ Storage::url($gallery->image) }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail produk -->
                <div class="col-lg-5 offset-lg-1 product-info">
                    <span class="fw-500 text-dark-gray d-block">{{ $product->category->name ?? '-' }}</span>
                    <h5 class="alt-font text-dark-gray fw-700 mb-10px">{{ $product->name }}</h5>

                    <div class="d-block d-sm-flex align-items-center mb-20px">
                        <div class="me-10px xs-me-0">
                            @for ($i = 0; $i < 5; $i++)
                                <i
                                    class="bi bi-star-fill {{ $i < $product->star ? 'text-golden-yellow' : 'text-muted' }}"></i>
                            @endfor
                        </div>
                        <a href="#tab"
                            class="me-25px text-dark-gray fw-500 section-link xs-me-0">{{ $product->star * 32 }}
                            Reviews</a>
                        <div><span class="text-dark-gray fw-500">SKU: </span>{{ $product->code }}</div>
                    </div>

                    {{-- <div class="product-price mb-10px">
                        <span class="text-dark-gray fs-28 xs-fs-24 fw-700 ls-minus-1px">
                            @if ($product->old_price)
                                <del class="text-medium-gray me-10px fw-500">Rp
                                    {{ number_format($product->old_price, 0, ',', '.') }}</del>
                            @endif
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    </div> --}}

                    <p>{!! $product->description !!}</p>

                    <div class="d-flex align-items-center flex-column flex-sm-row mb-20px position-relative">
                        <div class="quantity me-15px xs-mb-15px order-1">
                            <input class="qty-text" type="number" id="qtyInput" value="1" min="1"
                                step="1" />
                        </div>

                        <a href="#" id="waOrderBtn"
                            class="btn btn-cart btn-extra-large btn-dark-gray me-15px xs-me-0 order-3 order-sm-2"
                            target="_blank">
                            <span><i class="feather icon-feather-shopping-bag"></i> Pesan via WhatsApp</span>
                        </a>

                        <a href="#"
                            class="wishlist d-flex align-items-center justify-content-center border border-radius-5px border-color-extra-medium-gray order-2 order-sm-3">
                            <i class="feather icon-feather-heart icon-small text-base-color"></i>
                        </a>
                    </div>

                    <div class="mb-20px h-1px w-100 bg-extra-medium-gray d-block"></div>

                    <div class="row mb-15px">
                        <div class="col-12 icon-with-text-style-08">
                            <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                <div class="feature-box-content">
                                    <span><span class="alt-font text-dark-gray fw-500">Estimated delivery:</span> 2-5 hari
                                        kerja</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon d-inline-flex align-middle">
                                <div class="feature-box-content">
                                    <span><span class="alt-font text-dark-gray fw-500">Garansi pengembalian:</span> Dalam 7
                                        hari</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-very-light-gray ps-30px pe-30px pt-25px pb-25px mb-20px border-radius-4px">
                        <span class="alt-font fs-15 fw-500 text-dark-gray mb-15px d-block">Pembayaran aman dan
                            terpercaya</span>
                        <div>
                            <img src="{{ asset('images/visa.svg') }}" class="h-30px me-5px mb-5px" alt="">
                            <img src="{{ asset('images/mastercard.svg') }}" class="h-30px me-5px mb-5px" alt="">
                            <img src="{{ asset('images/american-express.svg') }}" class="h-30px me-5px mb-5px"
                                alt="">
                            <img src="{{ asset('images/discover.svg') }}" class="h-30px me-5px mb-5px" alt="">
                        </div>
                    </div>

                    <div>
                        <div class="w-100 d-block">
                            <span class="text-dark-gray alt-font fw-500">Kategori:</span>
                            <a href="{{ route('categorydetail', ['slug' => $product->category->slug]) }}">
                                {{ $product->category->name }}
                            </a>
                        </div>
                        @if ($product->tags)
                            <div>
                                <span class="text-dark-gray alt-font fw-500">Tags:</span>
                                @foreach (explode(',', $product->tags) as $tag)
                                    <a href="#"> {{ trim($tag) }}</a>
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const waBtn = document.getElementById('waOrderBtn');
            const qtyInput = document.getElementById('qtyInput');
            const qtyMinusBtn = document.querySelector('.qty-minus');
            const qtyPlusBtn = document.querySelector('.qty-plus');

            // Tombol WhatsApp
            waBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const qty = qtyInput.value || 1;
                const phone = "{{ preg_replace('/[^0-9]/', '', $contact->phone) }}";
                const productName = "{{ $product->name }}";

                const message =
                    `Halo, saya ingin pesan produk:\n\n📦 *${productName}*\n🔢 Jumlah: *${qty}*\n\nMohon infonya ya.`;
                const waUrl = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
                window.open(waUrl, '_blank');
            });

            // Tombol qty -
            qtyMinusBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let current = parseInt(qtyInput.value) || 1;
                if (current > 1) {
                    qtyInput.value = current - 1;
                }
            });

            // Tombol qty +
            qtyPlusBtn.addEventListener('click', function(e) {
                e.preventDefault();
                let current = parseInt(qtyInput.value) || 1;
                qtyInput.value = current + 1;
            });
        });
    </script>
@endpush
