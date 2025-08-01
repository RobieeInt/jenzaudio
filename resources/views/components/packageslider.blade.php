<section class="position-relative pt-0 overflow-hidden mt-2">
    <div id="portraitBannerCarousel" class="carousel slide mx-auto" style="max-width: 100%;" data-bs-ride="carousel"
        data-bs-interval="4000">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <img src="{{ asset('redesign/images/package1.webp') }}" class="carousel-portrait img-clickable"
                        alt="Image 1" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('redesign/images/package1.webp') }}">
                    <img src="{{ asset('redesign/images/package2.webp') }}" class="carousel-portrait img-clickable"
                        alt="Image 2" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('redesign/images/package2.webp') }}">
                </div>
            </div>

            <!-- Slide 2 -->
            {{-- <div class="carousel-item">
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <img src="{{ asset('redesign/images/package4.webp') }}" class="carousel-portrait img-clickable"
                        alt="Image 4" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('redesign/images/package4.webp') }}">
                    <img src="{{ asset('redesign/images/package5.webp') }}" class="carousel-portrait img-clickable"
                        alt="Image 5" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('redesign/images/package5.webp') }}">
                    <img src="{{ asset('redesign/images/package6.webp') }}" class="carousel-portrait img-clickable"
                        alt="Image 6" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('redesign/images/package6.webp') }}">
                </div>
            </div> --}}
        </div>

        <!-- Nav Buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#portraitBannerCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#portraitBannerCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</section>

<!-- Modal untuk full image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <img id="modalImage" src="" alt="Full Image" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</div>

<!-- Style -->
<style>
    .carousel-portrait {
        width: 320px;
        height: auto;
        object-fit: cover;
        object-position: center;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .carousel-portrait:hover {
        transform: scale(1.03);
    }

    @media (max-width: 768px) {
        .carousel-portrait {
            width: 90px;
            height: 160px;
        }
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 2rem;
        height: 2rem;
        background-size: 100% 100%;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
</style>

<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalImage = document.getElementById('modalImage');
        const clickableImages = document.querySelectorAll('.img-clickable');

        clickableImages.forEach(img => {
            img.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                modalImage.setAttribute('src', imageUrl);
            });
        });
    });
</script>
