@extends('frontend.layouts.base')

@section('title', 'Category')

@section('content')
    <!-- start page title -->
    <section class="page-title-center-alignment cover-background top-space-padding"
        style="background-image: url(images/demo-decor-store-title-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center position-relative page-title-extra-large">
                    <h1 class="alt-font d-inline-block fw-700 ls-minus-05px text-base-color mb-10px mt-3 md-mt-50px">
                        {{ $category->name }}</h1>
                </div>
                <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                    <ul>
                        {{ $category->description }}
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 px-0">
                    <ul class="blog-classic blog-wrapper grid-loading grid grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-double-extra-large"
                        data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                        <li class="grid-sizer"></li>
                        @forelse ($products as $item)
                            <li class="grid-item">
                                <div class="card bg-transparent border-0 h-100">
                                    <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                        <a href="{{ route('productDetail', ['slug' => $item->slug]) }}">
                                            <img src="{{ Storage::url($item->galleries->first()?->image ?? 'img/default.jpg') }}"
                                                alt="{{ $item->name }}" />
                                        </a>
                                    </div>
                                    <div class="card-body px-0 pt-30px pb-30px xs-pb-15px">
                                        <span class="fs-13 text-uppercase d-block mb-5px fw-500">
                                            <a href="{{ route('categorydetail', ['slug' => $item->category->slug]) }}"
                                                class="text-dark-gray fw-700 categories-text">
                                                {{ $item->category->name }}
                                            </a>
                                            <a href="#" class="blog-date">
                                                {{ $item->created_at->format('d M Y') }}
                                            </a>
                                        </span>
                                        <a href="{{ route('productDetail', ['slug' => $item->slug]) }}"
                                            class="card-title alt-font fw-600 fs-17 lh-30 text-dark-gray d-inline-block w-95 xs-w-100">
                                            {{ Str::limit($item->name, 50) }}
                                        </a>
                                        <p class="mt-2 text-muted">
                                            {{ Str::limit(strip_tags($item->short_description), 60) }}
                                        </p>
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
                                                    $contact->phone ?? '6281617000097',
                                                );
                                                $waUrl =
                                                    'https://wa.me/' . $phone . '?text=' . urlencode($whatsappMessage);
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
                        @empty
                            <div class="col-12 text-center mt-4">
                                <p class="text-muted">Belum ada produk tersedia untuk kategori ini.</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
                {{-- <div class="col-12 mt-3 sm-mb-3 d-flex justify-content-center"
                    data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="feather icon-feather-arrow-left fs-18 d-xs-none"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">01</a></li>
                        <li class="page-item active"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i
                                    class="feather icon-feather-arrow-right fs-18 d-xs-none"></i></a></li>
                    </ul>
                </div> --}}
                <div class="col-12 mt-3 sm-mb-3 d-flex justify-content-center"
                    data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay":100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    {{ $products->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
