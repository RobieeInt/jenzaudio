<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Tema Modifikasi Sesuai Karakter Kamu</h2>
            <p class="text-muted">Pilih gaya modifikasi audio & interior yang cocok dengan selera dan kebutuhan mobil
                kamu</p>
        </div>
        <div class="row g-4">
            <!-- Tema: SQ -->
            <div class="col-md-4">
                <a href="{{ route('event') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('redesign/images/mobil.jpeg') }}" class="card-img-top"
                            alt="SQ (Sound Quality)">
                        <div class="card-body">
                            <h5 class="fw-bold">SQ (Sound Quality)</h5>
                            <p class="mb-0 text-muted">Fokus pada kejernihan dan detail suara, cocok untuk penikmat
                                musik sejati.</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Tema: SPL -->
            <div class="col-md-4">
                <a href="{{ route('event') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('redesign/images/mobil.jpeg') }}" class="card-img-top"
                            alt="SPL (Sound Pressure Level)">
                        <div class="card-body">
                            <h5 class="fw-bold">SPL (Sound Pressure Level)</h5>
                            <p class="mb-0 text-muted">Suara super bertenaga dan hentakan bass yang kuat, cocok buat
                                kompetisi atau pameran.</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Tema: OEM Look -->
            <div class="col-md-4">
                <a href="{{ route('event') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset('redesign/images/mobil.jpeg') }}" class="card-img-top" alt="OEM Look">
                        <div class="card-body">
                            <h5 class="fw-bold">OEM Look</h5>
                            <p class="mb-0 text-muted">Desain audio & aksesoris terlihat menyatu dengan interior asli
                                mobil, rapi dan elegan.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
