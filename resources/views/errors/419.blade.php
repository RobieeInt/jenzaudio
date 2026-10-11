{{-- 419: sesi/CSRF kedaluwarsa, umumnya kejadian di form yang kelamaan dibuka. --}}
@extends('errors.layout')

@section('title', 'Sesi Kedaluwarsa')
@section('code', '419')
@section('badge', 'Sesi Berakhir')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
@endsection

@section('heading', 'Sesi Anda sudah kedaluwarsa')

@section('message')
    Halaman ini terlalu lama dibiarkan terbuka, jadi kami hentikan demi keamanan.
    <strong>Muat ulang halamannya, lalu coba lagi.</strong> Kalau masih gagal,
    kabari kami lewat WhatsApp.
@endsection

@section('wapesan', 'Halo, saya mengalami kendala saat membuka website Jenz Audio')

@section('secondary-action')
    <button type="button" onclick="location.reload()" class="btn btn-ghost">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 11a8 8 0 10-2.3 5.7"/><path d="M20 4v7h-7"/>
        </svg>
        Coba Lagi
    </button>
@endsection
