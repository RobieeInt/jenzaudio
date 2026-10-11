<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //paket bawaan, sebelumnya hardcode di resources/views/landing/pricing.blade.php
        $packages = [
            [
                'brand' => 'toyota',
                'name' => 'Paket Basic',
                'car_models' => 'Avanza, Veloz, Calya',
                'short_description' => 'Cocok untuk upgrade audio harian dengan budget hemat.',
                'description' => '<p>Paket dasar buat kamu yang mau suara lebih jernih tanpa ubah banyak bagian mobil. Semua instalasi dikerjakan rapi dan aman, tanpa potong kabel bodi.</p>',
                'features' => "Upgrade speaker depan\nInstalasi rapi & aman\nKonsultasi setup audio",
                'price' => 1500000,
                'discount_price' => null,
                'warranty' => 'Garansi pemasangan 6 bulan',
                'duration' => 'Pengerjaan 1 hari',
                'is_popular' => 0,
                'sort_order' => 1,
            ],
            [
                'brand' => 'toyota',
                'name' => 'Paket Signature',
                'car_models' => 'Innova, Fortuner, Rush',
                'short_description' => 'Balance antara kualitas suara dan fitur lengkap.',
                'description' => '<p>Pilihan paling banyak diambil. Speaker depan belakang diganti, ditambah subwoofer aktif, lalu di-tuning detail sesuai selera musik kamu.</p>',
                'features' => "Speaker depan & belakang\nPenambahan subwoofer aktif\nTuning detail sesuai selera\nQuality check keseluruhan sistem",
                'price' => 3500000,
                'discount_price' => 2800000,
                'warranty' => 'Garansi pemasangan 1 tahun',
                'duration' => 'Pengerjaan 1-2 hari',
                'is_popular' => 1,
                'sort_order' => 2,
            ],
            [
                'brand' => null,
                'name' => 'Paket Premium',
                'car_models' => null,
                'short_description' => 'Untuk pecinta audio yang ingin hasil maksimal.',
                'description' => '<p>Full upgrade sistem audio dengan opsi DSP dan konfigurasi staging. Tuning dilakukan berulang sampai karakter suaranya pas.</p>',
                'features' => "Full sistem audio upgrade\nOpsional DSP & konfigurasi staging\nTuning profesional berulang\nAfter sales support & konsultasi",
                'price' => 7500000,
                'discount_price' => null,
                'warranty' => 'Garansi pemasangan 1 tahun',
                'duration' => 'Pengerjaan 2-3 hari',
                'is_popular' => 0,
                'sort_order' => 3,
            ],
        ];

        foreach ($packages as $package) {
            $brandSlug = $package['brand'];
            unset($package['brand']);

            $package['car_brand_id'] = $brandSlug
                ? CarBrand::where('slug', $brandSlug)->value('id')
                : null;

            Package::updateOrCreate(
                ['slug' => Str::slug($package['name'])],
                $package + ['status' => 1]
            );
        }
    }
}
