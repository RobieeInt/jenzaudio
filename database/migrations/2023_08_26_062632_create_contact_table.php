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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->text('address');
            $table->text('telp');
            $table->text('phone');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('linkedin');
            $table->text('instagram');
            $table->text('youtube');
            $table->text('whatsapp');
            $table->string('image');
            $table->string('linkvideo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
