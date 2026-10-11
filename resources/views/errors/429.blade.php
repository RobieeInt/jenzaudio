{{-- 429: kena rate limit, kebanyakan request dari satu IP. --}}
@extends('errors.layout')

@section('title', 'Terlalu Banyak Permintaan')
@section('code', '429')
@section('badge', 'Tunggu Sebentar')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
@endsection

@section('heading', 'Permintaan Anda terlalu cepat')

@section('message')
    Kami menerima terlalu banyak permintaan dalam waktu singkat.
    <strong>Tunggu sebentar lalu coba lagi.</strong> Nggak mau nunggu?
    Chat WhatsApp kami saja, lebih cepat dibalas.
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
