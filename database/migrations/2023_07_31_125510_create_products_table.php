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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('price');
            $table->bigInteger('old_price')->nullable();
            $table->string('tags')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->integer('status')->default(1);
            // $table->enum('popular',['yes','no'])->default('no');
            $table->integer('popular')->default(0);
            //star
            $table->integer('star')->default(0);

            //get id from product_categories
            //softdeletes
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
