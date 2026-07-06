<style>
    #jenz-banner-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.80);
        backdrop-filter: blur(4px);
        z-index: 9998;
    }
    #jenz-banner-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }
    #jenz-banner-overlay.show,
    #jenz-banner-modal.show {
        display: flex;
    }
    .jenz-banner-wrap {
        position: relative;
        width: 100%;
        max-width: 420px;
    }
    @media (min-width: 768px) {
        .jenz-banner-wrap { max-width: 680px; }
        .jenz-banner-body { padding: 28px; }
        .jenz-banner-body h3 { font-size: 22px; }
        .jenz-banner-body p { font-size: 15px; margin-top: 10px; }
        .jenz-dots { margin-top: 20px; }
        .jenz-cta { margin-top: 24px; padding: 14px; font-size: 16px; border-radius: 14px; }
        .jenz-dismiss { margin-top: 12px; font-size: 13px; }
        .jenz-nav { width: 40px; height: 40px; font-size: 26px; }
    }
    .jenz-banner-close {
        position: absolute;
        top: -14px;
        right: -14px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #18181b;
        border: 1px solid #3f3f46;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        z-index: 20;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
        line-height: 1;
    }
    .jenz-banner-close:hover { background: #dc2626; }
    .jenz-banner-card {
        overflow: hidden;
        border-radius: 24px;
        background: #18181b;
        border: 1px solid #27272a;
        box-shadow: 0 25px 60px rgba(0,0,0,.8);
    }
    .jenz-slider-wrap { position: relative; }
    .jenz-slide { display: none; }
    .jenz-slide.active { display: block; }
    .jenz-slide img { width: 100%; display: block; object-fit: cover; }
    .jenz-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,.6);
        color: #fff;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        font-size: 22px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
        padding: 0;
    }
    .jenz-nav-prev { left: 8px; }
    .jenz-nav-next { right: 8px; }
    .jenz-banner-body { padding: 20px; }
    .jenz-banner-body h3 { margin: 0; font-size: 18px; font-weight: 700; color: #fff; }
    .jenz-banner-body p { margin: 8px 0 0; font-size: 13px; color: #a1a1aa; line-height: 1.5; }
    .jenz-dots { display: flex; justify-content: center; gap: 6px; margin-top: 16px; }
    .jenz-dot {
        height: 8px;
        border-radius: 4px;
        background: #52525b;
        border: none;
        cursor: pointer;
        transition: all .3s;
        width: 8px;
        padding: 0;
    }
    .jenz-dot.active { background: #f59e0b; width: 24px; }
    .jenz-cta {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        border-radius: 12px;
        background: #f59e0b;
        color: #000;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        transition: background .2s;
        box-sizing: border-box;
    }
    .jenz-cta:hover { background: #d97706; color: #000; text-decoration: none; }
    .jenz-dismiss {
        display: block;
        width: 100%;
        margin-top: 10px;
        background: none;
        border: none;
        color: #71717a;
        font-size: 12px;
        cursor: pointer;
        text-align: center;
        padding: 4px 0;
        transition: color .2s;
    }
    .jenz-dismiss:hover { color: #d4d4d8; }
</style>

{{-- Overlay --}}
<div id="jenz-banner-overlay" onclick="jenzBannerClose()"></div>

{{-- Modal --}}
<div id="jenz-banner-modal">
    <div class="jenz-banner-wrap">

        {{-- Close --}}
        <button class="jenz-banner-close" onclick="jenzBannerClose()" aria-label="Tutup">&#x2715;</button>

        {{-- Card --}}
        <div class="jenz-banner-card">

            {{-- Slider --}}
            <div class="jenz-slider-wrap">
                  <div class="jenz-slide active">
                    <img src="{{ asset('banner/package.webp') }}" alt="Paket Toyota Fortuner">
                </div>
                <div class="jenz-slide active">
                    <img src="{{ asset('banner/fortunerjenz.webp') }}" alt="Paket Toyota Fortuner">
                </div>
                <div class="jenz-slide">
                    <img src="{{ asset('banner/pajerojenz.webp') }}" alt="Paket Mitsubishi Pajero">
                </div>
                <div class="jenz-slide">
                    <img src="{{ asset('banner/zenixjenz.webp') }}" alt="Paket Toyota Zenix">
                </div>

                <button class="jenz-nav jenz-nav-prev" onclick="jenzSlide(-1)">&#8249;</button>
                <button class="jenz-nav jenz-nav-next" onclick="jenzSlide(1)">&#8250;</button>
            </div>

            {{-- Body --}}
            <div class="jenz-banner-body">
                <h3>Promo Paket Audio Mobil</h3>
                <p>Upgrade kualitas audio mobil kamu bersama Jenz Audio. Konsultasi gratis dan instalasi profesional.</p>

                {{-- Dots --}}
                <div class="jenz-dots" id="jenz-dots"></div>

                {{-- CTA --}}
                <a id="jenz-cta" href="#" target="_blank" class="jenz-cta">Konsultasi Sekarang</a>

                {{-- Dismiss --}}
                <button class="jenz-dismiss" onclick="jenzBannerDismiss()">Jangan tampilkan lagi</button>
            </div>

        </div>
    </div>
</div>

<script>
(function () {
    var SESSION_KEY = 'jenzBannerDismissed';

    var slides = [
        { text: 'Halo Jenz Audio, saya tertarik dengan paket Headunit' },
        { text: 'Halo Jenz Audio, saya tertarik dengan paket Toyota Fortuner' },
        { text: 'Halo Jenz Audio, saya tertarik dengan paket Mitsubishi Pajero' },
        { text: 'Halo Jenz Audio, saya tertarik dengan paket Toyota Zenix' }
    ];

    var current = 0;
    var autoTimer = null;

    function buildDots() {
        var container = document.getElementById('jenz-dots');
        container.innerHTML = '';
        slides.forEach(function (_, i) {
            var btn = document.createElement('button');
            btn.className = 'jenz-dot' + (i === 0 ? ' active' : '');
            btn.onclick = function () { jenzGoTo(i, true); };
            container.appendChild(btn);
        });
    }

    function updateUI() {
        document.querySelectorAll('.jenz-slide').forEach(function (el, i) {
            el.classList.toggle('active', i === current);
        });
        document.querySelectorAll('.jenz-dot').forEach(function (el, i) {
            el.classList.toggle('active', i === current);
        });
        var waText = encodeURIComponent(slides[current].text);
        document.getElementById('jenz-cta').href = 'https://wa.me/6281617000097?text=' + waText;
    }

    window.jenzGoTo = function (index, manual) {
        if (manual) { clearInterval(autoTimer); autoTimer = null; }
        current = (index + slides.length) % slides.length;
        updateUI();
    };

    window.jenzSlide = function (dir) {
        jenzGoTo(current + dir, true);
    };

    window.jenzBannerClose = function () {
        document.getElementById('jenz-banner-overlay').classList.remove('show');
        document.getElementById('jenz-banner-modal').classList.remove('show');
        clearInterval(autoTimer);
    };

    window.jenzBannerDismiss = function () {
        try { sessionStorage.setItem(SESSION_KEY, '1'); } catch(e) {}
        jenzBannerClose();
    };

    function init() {
        try {
            if (sessionStorage.getItem(SESSION_KEY)) return;
        } catch(e) {}

        buildDots();
        updateUI();

        setTimeout(function () {
            document.getElementById('jenz-banner-overlay').classList.add('show');
            document.getElementById('jenz-banner-modal').classList.add('show');
        }, 1500);

        autoTimer = setInterval(function () {
            jenzGoTo(current + 1);
        }, 4000);

        // swipe support
        var sliderEl = document.querySelector('.jenz-slider-wrap');
        var touchStartX = 0;
        sliderEl.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].clientX;
        }, { passive: true });
        sliderEl.addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) jenzGoTo(current + (diff > 0 ? 1 : -1), true);
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
