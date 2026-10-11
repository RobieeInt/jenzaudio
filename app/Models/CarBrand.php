<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarBrand extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'car_brands';
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'status',
        'sort_order',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class, 'car_brand_id');
    }

    //scopeActive: merk aktif, urut sesuai sort_order
    public function scopeActive($query)
    {
        return $query->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');
    }
}
