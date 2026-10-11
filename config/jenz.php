<?php

/*
|--------------------------------------------------------------------------
| Data Bisnis Jenz Audio
|--------------------------------------------------------------------------
|
| Satu tempat buat semua angka & info yang tampil di landing page.
| Mau ganti angka statistik atau nomor WA? Ubah di sini aja, otomatis
| keganti di semua section. Jangan ditulis ulang di blade.
|
*/

return [

    'name' => 'Jenz Audio',
    'tagline' => 'Spesialis Audio Mobil Gading Serpong',

    //berdiri sejak, dipakai buat ngitung "x tahun pengalaman" otomatis
    'since' => 2018,

    //nomor WhatsApp, format internasional tanpa tanda baca
    'whatsapp' => '6281617000097',
    'phone_display' => '0816-1700-0097',

    'address' => 'Ruko Bavaria Grande No. 11, Gading Serpong, Kec. Kelapa Dua, Kab. Tangerang, Banten 15831',
    'address_short' => 'Ruko Bavaria Grande No. 11, Gading Serpong',

    /*
    | Titik lokasi toko di Google Maps.
    | 'lat' & 'lng' dipakai buat peta dan tombol rute, jadi cukup ubah di sini
    | kalau suatu saat tokonya pindah.
    */
    'lat' => -6.2437428,
    'lng' => 106.6208292,

    //link halaman toko di Google Maps (buat lihat foto & ulasan)
    'maps_url' => 'https://www.google.com/maps/place/Jenz+Audio/@-6.2437428,106.6208292,17z/data=!4m8!3m7!1s0x2e69fd9d82e5625f:0x95003ae34584f9e!8m2!3d-6.2437428!4d106.6208292!16s%2Fg%2F11gyyskf99',

    'hours' => [
        'Senin - Sabtu' => '09.00 - 18.00 WIB',
        'Minggu' => 'Tutup',
    ],

    /*
    | Rating Google. Update manual kalau angkanya berubah.
    | Terakhir dicek 11 Oktober 2026: 4,9 dari 314 ulasan.
    */
    'google' => [
        'rating' => 4.9,
        'reviews' => 314,
        'url' => 'https://www.google.com/maps/place/Jenz+Audio/@-6.2437428,106.6208292,17z/data=!4m8!3m7!1s0x2e69fd9d82e5625f:0x95003ae34584f9e!8m2!3d-6.2437428!4d106.6208292!9m1!1b1!16s%2Fg%2F11gyyskf99',
    ],

    /*
    | Foto background hero. Dikosongin = pakai background gradien buatan,
    | yang penting teksnya selalu kebaca.
    |
    | Kalau mau pasang foto, taruh di public/redesign/images/ lalu isi di sini, contoh:
    |   'hero_images' => ['redesign/images/hero-1.webp', 'redesign/images/hero-2.webp'],
    |
    | Syaratnya: foto landscape, JANGAN yang udah ada tulisannya (banner promo),
    | nanti tabrakan sama judul di hero.
    */
    'hero_images' => [],

    'social' => [
        'instagram' => 'https://www.instagram.com/jenz_audio/',
        'tiktok' => 'https://www.tiktok.com/@jenz_audio',
        'youtube' => 'https://www.youtube.com/channel/UCRbHOp4uCQ7k_UGmYvu1cCg',
    ],

];
