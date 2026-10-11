<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Toyota',
            'Daihatsu',
            'Honda',
            'Mitsubishi',
            'Suzuki',
            'Wuling',
            'Hyundai',
        ];

        foreach ($brands as $key => $brand) {
            CarBrand::updateOrCreate(
                ['slug' => Str::slug($brand)],
                [
                    'name' => $brand,
                    'status' => 1,
                    'sort_order' => $key + 1,
                ]
            );
        }
    }
}
