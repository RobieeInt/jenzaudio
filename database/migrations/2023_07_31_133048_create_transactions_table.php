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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('invoice_number');
            $table->integer('shipping_price')->nullable();
            $table->integer('insurance_price')->nullable();
            $table->integer('total_price');
            $table->enum('transaction_status',['pending','shipping','success','failed']);
            $table->enum('payment_status',['pending','success','failed']);
            $table->string('resi')->nullable();
            $table->string('payment_url')->nullable();
            $table->string('payment_method')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
