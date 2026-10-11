{{-- 403: akses ditolak, biasanya nyasar ke area admin. --}}
@extends('errors.layout')

@section('title', 'Akses Ditolak')
@section('code', '403')
@section('badge', 'Akses Dibatasi')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
@endsection

@section('heading', 'Halaman ini tidak bisa diakses')

@section('message')
    Halaman yang Anda tuju bersifat terbatas. Kalau Anda sedang mencari informasi
    paket, layanan, atau harga, <strong>semuanya ada di beranda atau bisa langsung
    ditanyakan lewat WhatsApp.</strong>
@endsection

@section('wapesan', 'Halo, saya mau konsultasi soal audio mobil')

@section('secondary-action')
    <a href="{{ url('/') }}" class="btn btn-ghost">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M3 10.5L12 3l9 7.5"/><path d="M5 9.5V20h14V9.5"/>
        </svg>
        Ke Beranda
    </a>
@endsection
