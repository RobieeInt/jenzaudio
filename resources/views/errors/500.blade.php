{{-- 500: server ngadat. Yang penting bukan kodenya, tapi jalur konsultasinya tetap kebuka. --}}
@extends('errors.layout')

@section('title', 'Sedang Perbaikan')
@section('code', '500')
@section('badge', 'Sedang Perbaikan')
@section('badge-icon')
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a4 4 0 005.2 5.2l-9.4 9.4a2.5 2.5 0 01-3.5-3.5l9.4-9.4z"/><path d="M18 2l-2.5 2.5"/></svg>
@endsection

@section('heading', 'Website kami sedang dalam perbaikan')

@section('message')
    Ada gangguan teknis sebentar di sistem kami, bukan dari koneksi Anda.
    Tim kami sudah menanganinya. <strong>Mau tanya paket atau harga? Chat WhatsApp aja,
    kami tetap melayani seperti biasa.</strong>
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
