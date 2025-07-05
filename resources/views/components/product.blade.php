<section class="pt-0 pb-0">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 tab-style-04">
                <ul class="nav nav-tabs border-0 justify-content-center text-uppercase fw-600 mb-50px sm-mb-20px alt-font fs-32 ls-minus-05px text-transform-none"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <li class="nav-item"><a data-bs-toggle="tab" href="#tab_five1" class="nav-link active">Best sellers<span
                                class="tab-border bg-dark-gray h-2px"></span></a></li>
                </ul>
                <div class="tab-content">
                    <!-- start tab content -->
                    <div class="tab-pane fade in active show" id="tab_five1">
                        <div class="row">
                            <div class="col-12 filter-content">
                                <ul class="shop-boxed shop-wrapper grid grid-4col xxl-grid-5col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large text-center"
                                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay":150, "staggervalue": 150, "easing": "easeOutQuad" }'>
                                    <li class="grid-sizer"></li>

                                    @foreach ($productsPopular as $item)
                                        <li class="grid-item">
                                            <div class="shop-box pb-25px">
                                                <div class="shop-image">
                                                    <a href="{{ route('productDetail', ['slug' => $item->slug]) }}">
                                                        <img src="{{ Storage::url($item->galleries->first()?->image) }}"
                                                            alt="{{ $item->short_description }}" />
                                                        <div
                                                            class="product-overlay bg-gradient-extra-midium-gray-transparent">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="shop-footer text-center pt-20px">
                                                    <a href="#"
                                                        class="text-dark-gray fs-17 alt-font fw-600">{{ $item->name }}</a>
                                                    <div class="fw-500 fs-15 lh-normal">
                                                        @php
                                                            $productName = $item->name ?? 'Produk';
                                                            $price = 'Rp ' . number_format($item->price, 0, ',', '.');
                                                            $oldPrice = $item->old_price
                                                                ? ' (Harga sebelumnya: Rp ' .
                                                                    number_format($item->old_price, 0, ',', '.') .
                                                                    ')'
                                                                : '';
                                                            $whatsappMessage = "Halo, saya tertarik dengan produk *$productName* Bisa Minta Info nya?";
                                                            $phone = preg_replace(
                                                                '/[^0-9]/',
                                                                '',
                                                                $contact->phone ?? '628568780192',
                                                            );
                                                            $waUrl =
                                                                'https://wa.me/' .
                                                                $phone .
                                                                '?text=' .
                                                                urlencode($whatsappMessage);
                                                        @endphp

                                                        <a href="{{ $waUrl }}" target="_blank"
                                                            class="btn btn-sm border border-success text-success bg-white"
                                                            style="transition: all 0.2s ease-in-out;"
                                                            onmouseover="this.style.backgroundColor='#d4edda'; this.style.color='black';"
                                                            onmouseout="this.style.backgroundColor='white'; this.style.color='#198754';">
                                                            Chat via WhatsApp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                    {{-- @for ($i = 1; $i <= 10; $i++)
                                        <li class="grid-item">
                                            <div class="shop-box pb-25px">
                                                <div class="shop-image">
                                                    <a href="#">
                                                        <img src="https://placehold.co/600x700?text=Product+{{ $i }}"
                                                            alt="Product {{ $i }}" />
                                                        <div
                                                            class="product-overlay bg-gradient-extra-midium-gray-transparent">
                                                        </div>
                                                    </a>
                                                    <div class="shop-hover d-flex justify-content-center">
                                                        <a href="#"
                                                            class="bg-white w-45px h-45px text-dark-gray d-flex flex-column align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-medium-bottom"
                                                            data-bs-toggle="tooltip" title="Add to wishlist">
                                                            <i class="feather icon-feather-heart fs-15"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="bg-white w-45px h-45px text-dark-gray d-flex flex-column align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-medium-bottom"
                                                            data-bs-toggle="tooltip" title="Add to cart">
                                                            <i class="feather icon-feather-shopping-bag fs-15"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="bg-white w-45px h-45px text-dark-gray d-flex flex-column align-items-center justify-content-center rounded-circle ms-5px me-5px box-shadow-medium-bottom"
                                                            data-bs-toggle="tooltip" title="Quick shop">
                                                            <i class="feather icon-feather-eye fs-15"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="shop-footer text-center pt-20px">
                                                    <a href="#"
                                                        class="text-dark-gray fs-17 alt-font fw-600">Produk Audio
                                                        {{ $i }}</a>
                                                    <div class="fw-500 fs-15 lh-normal"><del>$99.00</del> $79.00</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endfor --}}

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
            </div>
        </div>
    </div>
</section>
