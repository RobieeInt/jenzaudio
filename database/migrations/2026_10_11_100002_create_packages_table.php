<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            //null = paket universal (semua mobil)
            $table->foreignId('car_brand_id')->nullable()->constrained('car_brands')->nullOnDelete();
            $table->string('name');
            $table->string('slug');
            //tipe mobil bebas, contoh: Avanza, Veloz, Rush
            $table->string('car_models')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            //isi paket, 1 baris = 1 item
            $table->text('features')->nullable();
            //kosong = tampil "Hubungi Kami"
            $table->bigInteger('price')->nullable();
            //kosong = tanpa diskon
            $table->bigInteger('discount_price')->nullable();
            //diskon auto mati setelah tanggal ini
            $table->date('discount_until')->nullable();
            $table->string('warranty')->nullable();
            $table->string('duration')->nullable();
            $table->integer('is_popular')->default(0);
            $table->integer('status')->default(1);
            $table->integer('sort_order')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
