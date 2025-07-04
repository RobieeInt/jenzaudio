<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Layanan Custom Mobil dari Jenz Audio</h2>
            <p class="text-muted">Ubah tampilan dan suara mobil kamu jadi lebih keren dan beda dari yang lain</p>
        </div>
        <div class="row g-4">
            <!-- Category: Custom Audio System -->
            @foreach ($category as $item)
                <div class="col-md-4">
                    <a href="{{ route('categorydetail', ['slug' => $item->slug]) }}"
                        class="text-decoration-none text-dark">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="Aksesoris Interior">
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $item->name }}</h5>
                                <p class="mb-0 text-muted">{{ Str::limit($item->description, 80) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{-- <!-- Category: Aksesoris Interior -->
            <div class="col-md-4">
                <a href="{{ route('event') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('redesign/images/mobil.jpeg') }}" class="card-img-top"
                            alt="Aksesoris Interior">
                        <div class="card-body">
                            <h5 class="fw-bold">Aksesoris Interior</h5>
                            <p class="mb-0 text-muted">Upgrade interior mobil kamu dengan aksesoris premium, lighting,
                                panel, dan trim keren.</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Category: Eksterior & Pencahayaan -->
            <div class="col-md-4">
                <a href="{{ route('event') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('redesign/images/mobil.jpeg') }}" class="card-img-top"
                            alt="Eksterior & Pencahayaan">
                        <div class="card-body">
                            <h5 class="fw-bold">Eksterior & Pencahayaan</h5>
                            <p class="mb-0 text-muted">Tampil beda di jalan dengan body kit, lampu custom, dan
                                modifikasi eksterior sesuai gaya kamu.</p>
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>
    </div>
</section>
