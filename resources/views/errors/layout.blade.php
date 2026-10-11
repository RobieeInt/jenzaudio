{{--
|--------------------------------------------------------------------------
| Layout halaman error
|--------------------------------------------------------------------------
|
| SENGAJA DIBIKIN BERDIRI SENDIRI. Halaman ini muncul justru waktu ada yang
| rusak, jadi dia ga boleh ikut rusak:
|   - CSS ditulis inline, BUKAN lewat Tailwind/Vite. Kalau manifest build
|     ilang atau belum `yarn build`, @vite() bakal error dan halaman error
|     ini malah jadi layar putih.
|   - Ga ada query database sama sekali. Error 500 paling sering gara-gara DB
|     mati, jadi kalau halaman ini nanya DB ya ikut mati juga.
|   - Semua data diambil dari config/jenz.php (file biasa, aman).
|
| Yang penting: tombol WhatsApp selalu nongol, biar calon customer tetap bisa
| konsultasi walaupun webnya lagi ngadat.
--}}
@php
    $jenz = config('jenz');

    $wa = $jenz['whatsapp'] ?? '6281617000097';
    $waPesan = trim($__env->yieldContent('wapesan')) ?: 'Halo, saya mau konsultasi soal audio mobil';
    $waLink = 'https://wa.me/' . $wa . '?text=' . urlencode($waPesan);

    $rute = 'https://www.google.com/maps/dir/?api=1&destination='
        . ($jenz['lat'] ?? '') . ',' . ($jenz['lng'] ?? '') . '&travelmode=driving';
@endphp
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') &middot; {{ $jenz['name'] ?? 'Jenz Audio' }}</title>
    <link rel="shortcut icon" href="{{ asset('redesign/images/jenzlogobg.png') }}">

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --bg: #09090b;        /* zinc-950 */
            --card: #18181b;      /* zinc-900 */
            --line: #27272a;      /* zinc-800 */
            --line-soft: #3f3f46; /* zinc-700 */
            --text: #ffffff;
            --muted: #a1a1aa;     /* zinc-400 */
            --faint: #71717a;     /* zinc-500 */
            --amber: #f59e0b;
            --amber-light: #fbbf24;
        }

        html, body { margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background-color: var(--bg);
            color: var(--text);
            font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto,
                         "Helvetica Neue", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 28px 16px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background: grid halus + cahaya amber, sama kaya hero landing page */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .035) 1px, transparent 1px);
            background-size: 54px 54px;
            mask-image: radial-gradient(ellipse at 50% 0%, #000 55%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse at 50% 0%, #000 55%, transparent 100%);
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            top: -180px;
            left: 50%;
            width: 620px;
            height: 620px;
            margin-left: -310px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245, 158, 11, .17) 0%, transparent 68%);
            filter: blur(46px);
            pointer-events: none;
        }

        .wrap { position: relative; width: 100%; max-width: 620px; text-align: center; }

        .logo { display: block; height: 46px; width: auto; margin: 0 auto 26px; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 15px 7px 13px;
            margin-bottom: 22px;
            border: 1px solid rgba(245, 158, 11, .35);
            border-radius: 999px;
            background: rgba(245, 158, 11, .1);
            color: var(--amber-light);
            font-size: 12.5px;
            font-weight: 600;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .badge svg { width: 15px; height: 15px; flex-shrink: 0; }

        /* Angka kode error, tipis & kalem biar ga nakutin orang awam */
        .code {
            font-size: 58px;
            line-height: 1;
            font-weight: 800;
            letter-spacing: -.03em;
            color: transparent;
            -webkit-text-stroke: 1.5px var(--line-soft);
            margin: 0 0 16px;
        }

        h1 {
            font-size: 27px;
            line-height: 1.25;
            font-weight: 700;
            letter-spacing: -.02em;
            margin: 0 0 14px;
        }

        .lead { font-size: 15.5px; line-height: 1.65; color: var(--muted); margin: 0 auto 30px; max-width: 460px; }
        .lead strong { color: #e4e4e7; font-weight: 600; }

        /* Tombol */
        .actions { display: flex; flex-direction: column; gap: 11px; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            padding: 15px 22px;
            border: 1px solid transparent;
            border-radius: 13px;
            font-size: 14.5px;
            font-weight: 700;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
            transition: transform .18s ease, background-color .18s ease,
                        border-color .18s ease, color .18s ease;
        }

        .btn svg { width: 19px; height: 19px; flex-shrink: 0; }

        .btn-wa {
            background: var(--amber);
            color: #09090b;
            box-shadow: 0 10px 28px -10px rgba(245, 158, 11, .55);
        }

        .btn-wa:hover { background: var(--amber-light); transform: translateY(-2px); }
        .btn-wa small { display: block; font-size: 11.5px; font-weight: 600; opacity: .72; }

        .btn-ghost { background: transparent; border-color: var(--line-soft); color: #d4d4d8; font-weight: 600; }
        .btn-ghost:hover { border-color: var(--amber); color: var(--amber); }

        .btn-row { display: flex; gap: 11px; }
        .btn-row .btn { width: auto; flex: 1; padding-left: 14px; padding-right: 14px; }

        /* Info toko */
        .info {
            margin-top: 32px;
            padding-top: 26px;
            border-top: 1px solid var(--line);
            display: grid;
            gap: 20px;
            text-align: left;
        }

        .info-item { display: flex; gap: 12px; }
        .info-item svg { width: 17px; height: 17px; margin-top: 2px; flex-shrink: 0; color: var(--amber); }
        .info-label { display: block; font-size: 11.5px; font-weight: 700; letter-spacing: .07em; text-transform: uppercase; color: var(--faint); margin-bottom: 5px; }
        .info-item p { margin: 0; font-size: 13.5px; line-height: 1.6; color: var(--muted); }
        .info-item a { color: var(--amber); text-decoration: none; font-weight: 600; }
        .info-item a:hover { text-decoration: underline; }
        .hours { margin: 0; font-size: 13.5px; line-height: 1.75; color: var(--muted); }
        .hours span { color: #e4e4e7; font-weight: 600; }

        .foot { margin-top: 30px; font-size: 12px; color: #52525b; }

        @media (min-width: 560px) {
            .logo { height: 54px; }
            .code { font-size: 76px; }
            h1 { font-size: 34px; }
            .lead { font-size: 16.5px; }
            .actions { flex-direction: row; justify-content: center; }
            .btn { width: auto; }
            .btn-wa { padding-left: 30px; padding-right: 30px; }
            .btn-row { flex: 0 0 auto; }
            .info { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px; }
        }

        @media (prefers-reduced-motion: reduce) {
            .btn { transition: none; }
            .btn:hover { transform: none; }
        }
    </style>
</head>

<body>
    <main class="wrap">
        <img src="{{ asset('redesign/images/jenzlogobg.png') }}" alt="{{ $jenz['name'] ?? 'Jenz Audio' }}" class="logo">

        <span class="badge">
            @yield('badge-icon')
            @yield('badge')
        </span>

        <p class="code">@yield('code')</p>

        <h1>@yield('heading')</h1>

        <p class="lead">@yield('message')</p>

        <div class="actions">
            {{-- Tombol utama: konsultasi tetap jalan walaupun web lagi ngadat --}}
            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="btn btn-wa">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M12 2a10 10 0 00-8.6 15.1L2 22l4.9-1.4A10 10 0 1012 2zm0 18a8 8 0 01-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1112 20z" />
                </svg>
                <span>
                    Chat WhatsApp
                    <small>Dibalas cepat, konsultasi gratis</small>
                </span>
            </a>

            <div class="btn-row">
                @yield('secondary-action')

                <a href="tel:+{{ $wa }}" class="btn btn-ghost">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M3 5a2 2 0 012-2h2.2a1 1 0 01.96.73l1.1 4.08a1 1 0 01-.27.97l-1.6 1.6a12 12 0 005.4 5.4l1.6-1.6a1 1 0 01.97-.27l4.08 1.1a1 1 0 01.73.96V19a2 2 0 01-2 2h-1A16 16 0 013 6V5z" />
                    </svg>
                    Telepon
                </a>
            </div>
        </div>

        <div class="info">
            <div class="info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 2a7 7 0 00-7 7c0 4.4 5 9.4 6.4 10.8a1 1 0 001.2 0C14 18.4 19 13.4 19 9a7 7 0 00-7-7z" />
                    <circle cx="12" cy="9" r="2.5" />
                </svg>
                <div>
                    <span class="info-label">Datang langsung</span>
                    <p>
                        {{ $jenz['address_short'] ?? '' }}<br>
                        <a href="{{ $rute }}" target="_blank" rel="noopener">Lihat rute &rsaquo;</a>
                    </p>
                </div>
            </div>

            <div class="info-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div>
                    <span class="info-label">Jam buka</span>
                    <p class="hours">
                        @foreach ($jenz['hours'] ?? [] as $hari => $jam)
                            {{ $hari }}: <span>{{ $jam }}</span><br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        <p class="foot">{{ $jenz['name'] ?? 'Jenz Audio' }} &middot; {{ $jenz['tagline'] ?? '' }}</p>
    </main>
</body>

</html>
