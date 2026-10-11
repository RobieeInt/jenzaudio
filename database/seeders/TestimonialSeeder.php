<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Ulasan asli pelanggan dari Google Maps (Jenz Audio, Gading Serpong).
     * Diambil 11 Oktober 2026, saat itu rating 4,9 dari 314 ulasan.
     *
     * Kalau mau nambah ulasan baru, tinggal tambahin di array ini lalu:
     *   php artisan db:seed --class=TestimonialSeeder
     * Aman dijalanin berulang, pakai updateOrCreate jadi ga dobel.
     */
    public function run(): void
    {
        $reviews = [
            ['Alfi Syahrin', 'Head Unit · Honda CR-V Turbo', 'Pasang Head unit Venom 10 inch di CRV turbo, mantab, Owner nya ramah, ditraktir kopi, tehnisi nya bagus dan ramah pemasangan rapih dan cepat, rekomendasi buat yg pengen upgrade.'],
            ['Ardhi Kuswikanto', 'Monitor Android & Speaker', 'Sudah lama langganan sama Koh Anton di Jenz Audio. Ini mobil ketiga yang dipasang modifikasi monitor android & upgrade speaker. Pelayanan selalu ciamik, hasil memuaskan. Untuk harga bersaing, rekomended.'],
            ['Irfan Irawan', 'Head Unit & Dashcam · Suzuki Ignis', 'Ignis 2017 saya Headunit nya di upgrade ke Nakamichi plus kamera parkir dan dashcam depan belakang di sini. Booking mudah by WA, dateng agak mepet dari waktu mau tutup tapi tetep dilayani dengan super baik. Hasil kerja rapih.'],
            ['Anggih Putra', 'Peredam Full Body · Honda Freed', 'Pemasangan Audio keren. Saya pasang peredam Full Body Honda Freed hanya 1 Hari ajaa. Sudah dengan pasang prosesor audio juga. Bisa disesuaikan budget. Harga top pokoknya.'],
            ['vixion trav', 'Head Unit & Kamera 360 · Toyota Agya', 'Liburan iseng2 pasang HU 10 inch dan kamera 360 utk Agya 2021. Pelayanan memuaskan, dibikinkan kopi sama ownernya dan di kasih es teh manis. Karyawannya ramah2 doyan goyonan.'],
            ['Molly wally', 'Head Unit · Honda City', 'Ganti LCD/head unit Honda City upgrade ke Nakamichi Android/carplay di Jenz Audio, pengerjaan cepat & memuaskan, recommended service.'],
            ['Christian Pang (CK)', 'Head Unit · Mazda CX-5', 'Pasang HU Mazda CX5 baru, Ko Natan mantap servisnya bakal balik lagi sih.'],
            ['Adhitya Pratama', 'Head Unit · Nissan Grand Livina', 'Pelayanan dan harga terbaik untuk HU Audioteq dipasang di grand livina. Makasih banyak ko Natan dan team.'],
            ['Michael Purba', 'Troubleshooting · Mazda Biante', 'Cek tombol stir mazda biante yg ga fungsi, ternyata ada salah colok kabel aux dr bengkel sebelumnya. Pelayanan oke dan cepat.'],
            ['Victor Nugroho', 'Perbaikan Speaker', 'Dapat memberikan solusi yang cepat dalam menganalisa speaker mobil yang suaranya tidak balance. Great job. Recommended workshop.'],
            ['Galih Rengga Damarwulan', 'Konsultasi & Pemasangan', 'Mantaaapp. Ko Antonnya kasi solusi yang terbaik. Timnya juga cepet ngerjainnya dan rapih. Semua dicek dulu sebelum dikerjakan.'],
            ['Bernard Tanuhaerun', 'Konsultasi & Troubleshooting', 'Bengkel audio Tangerang, gading serpong termantab. Konsultasi bisa, trouble shooting juga bisa.'],
            ['Felix yapto', 'Ulasan Google', 'Toko rapi, bersih, pelayanan ramah, tidak ada main harga, kualitas terjamin, pemasangan rapi. Top deh untuk owner dan tokonya, semoga lancar dan sukses terus ya.'],
            ['oki rain', 'Head Unit', 'Pasang head unit disini rekomended bgt, diarahin sama ownernya langsung. After sales mantapp, dibeliin kopi juga sama owner. Mantap koo.'],
            ['amud amud', 'Upgrade Audio', 'Udah dua kali pasang audio disini, hasilnya kreeen dan memuaskan. Rapih pemasanganya, sukses selalu Bossss.'],
            ['Dede Kurniawan', 'Audio Mobil & Dashcam', 'Pertama ke Jenz pasang Audio Mobil, pelayanannya bagus bgt. Dteng yg kedua kali pasang dashcam, next bakal dateng kesini lgi.'],
            ['Airfox 73', 'Pemasangan Audio', 'Pemasangan audio rapih, harga bersahabat. Owner friendly. Tempat nyaman. Top, puas bgt.'],
            ['Dani Syaputra', 'Upgrade Audio', 'Audio mantap, pemasangan oke rapi, harga bersahabat. Pokoknya oke semua, nanti bakal kesini lg buat jajan yg lain.'],
            ['iwan Gunawan', 'Ulasan Google', 'Pelayanan ramah, pengerjaan nya rapih, yang pasti harga bersaing. Pokok na mah mantul pisan euy.'],
            ['Mawar Dwi Putranty', 'Ulasan Google', 'Pelayanan Ok bgt, krn detail menjelaskan kualitas produk yg ditanyakan oleh customer, hargapun normal.'],
            ['Arief Mulsandi Soegiharto', 'Audio Mobil', 'Cepat dan Rapi dalam pengerjaannya, terima kasih. Recommended buat audio mobil.'],
            ['RuDY Siagian', 'Dashcam', 'Lagi nyari dascam mobil, mampir ke Jenz Audio. Dijelasin langsung sama owner toko.'],
            ['Ivan Satriadi', 'Dashcam', 'Puas banget pasang dash cam di sini! Harga oke, pelayanannya cepat dan hasilnya rapi. Bisa tanya-tanya dulu, seller ramah. Recommended!'],
            ['Tanto Wibowo', 'Dashcam', 'Pelayanan baik, pengerjaan rapih, untuk dashcam harga kompetitif.'],
            ['nelson sitompul', 'Dashcam', 'Pasang dashcam disini. Respon cepat dan pelayanannya mantap. Sukses terus.'],
            ['I Made Werlianta', 'Dashcam', 'Beli dashcam, pelayanan cepat dan sangat baik. Terima kasih.'],
            ['Lina', 'Plat LED', 'Pasang plat mobil led disini cukup murah 250rb. Staffnya ramah juga. Tempat nunggunya adem. Recommended.'],
            ['Shona Sulistya', 'Ulasan Google', 'Mantap nih pelayanan cepat dan profesional.'],
            ['priyayi nasi', 'Ulasan Google', 'Layanan mantab, Enigma ok juga. Makasih yak.'],
            ['Nurlaili Fitriani', 'Ulasan Google', 'Bagus semuanya, pokoknya recomended.'],
        ];

        foreach ($reviews as $review) {
            [$name, $profession, $testimoni] = $review;

            Testimoni::updateOrCreate(
                ['name' => $name],
                [
                    'profession' => $profession,
                    'testimoni' => $testimoni,
                    //kosong = tampil inisial nama, bukan foto
                    'image' => '',
                    'star' => 5,
                ]
            );
        }
    }
}
