<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('product_categories')->insert([
            'name' => 'Laptop',
            'slug' => 'laptop',
            'description' => 'Laptop',
            'image' => 'laptop.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Smartphone',
            'slug' => 'smartphone',
            'description' => 'Smartphone',
            'image' => 'smartphone.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Tablet',
            'slug' => 'tablet',
            'description' => 'Tablet',
            'image' => 'tablet.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Smartwatch',
            'slug' => 'smartwatch',
            'description' => 'Smartwatch',
            'image' => 'smartwatch.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_categories')->insert([
            'name' => 'Aksesoris',
            'slug' => 'aksesoris',
            'description' => 'Aksesoris',
            'image' => 'aksesoris.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
