{{-- 503: maintenance beneran (`php artisan down`) atau server kelebihan beban. --}}
@extends('errors.layout')

@section('title', 'Sedang Maintenance')
@section('code', '503')
@section('badge', 'Sedang Maintenance')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a4 4 0 005.2 5.2l-9.4 9.4a2.5 2.5 0 01-3.5-3.5l9.4-9.4z"/><path d="M18 2l-2.5 2.5"/></svg>
@endsection

@section('heading', 'Website sedang kami rapikan')

@section('message')
    Kami sedang melakukan pemeliharaan rutin, sebentar lagi normal kembali.
    <strong>Bengkel tetap buka dan WhatsApp tetap aktif</strong>, jadi konsultasi
    dan booking pemasangan masih bisa jalan seperti biasa.
@endsection

@section('wapesan', 'Halo, saya mau konsultasi soal audio mobil')

@section('secondary-action')
    <button type="button" onclick="location.reload()" class="btn btn-ghost">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 11a8 8 0 10-2.3 5.7"/><path d="M20 4v7h-7"/>
        </svg>
        Coba Lagi
    </button>
@endsection
