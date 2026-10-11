{{-- 404: paling sering kena pengunjung dari Google/Ads, link paket yang udah diganti. --}}
@extends('errors.layout')

@section('title', 'Halaman Tidak Ditemukan')
@section('code', '404')
@section('badge', 'Halaman Tidak Ada')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-4.3-4.3"/></svg>
@endsection

@section('heading', 'Halaman yang Anda cari tidak ada')

@section('message')
    Mungkin alamatnya salah ketik, atau halamannya sudah kami pindahkan.
    <strong>Cari paket audio untuk mobil Anda? Tanya langsung lewat WhatsApp,
    kami bantu carikan.</strong>
@endsection

@section('wapesan', 'Halo, saya mau tanya paket audio untuk mobil saya')

@section('secondary-action')
    <a href="{{ url('/') }}" class="btn btn-ghost">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M3 10.5L12 3l9 7.5"/><path d="M5 9.5V20h14V9.5"/>
        </svg>
        Ke Beranda
    </a>
@endsection
