<?php

namespace App\Models;

use App\Models\CarBrand;
use App\Models\PackageGalleries;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'packages';
    protected $fillable = [
        'car_brand_id',
        'name',
        'slug',
        'car_models',
        'short_description',
        'description',
        'features',
        'price',
        'discount_price',
        'discount_until',
        'warranty',
        'duration',
        'is_popular',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'discount_until' => 'date',
    ];

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }

    public function galleries()
    {
        return $this->hasMany(PackageGalleries::class, 'package_id');
    }

    //scopeActive: paket aktif, urut sesuai sort_order
    public function scopeActive($query)
    {
        return $query->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc');
    }

    //hasDiscount: diskon cuma kepake kalau lebih murah dari harga normal dan belum lewat tanggalnya
    public function getHasDiscountAttribute()
    {
        if (!$this->price || !$this->discount_price) {
            return false;
        }

        if ($this->discount_price <= 0 || $this->discount_price >= $this->price) {
            return false;
        }

        if ($this->discount_until && $this->discount_until->isPast() && !$this->discount_until->isToday()) {
            return false;
        }

        return true;
    }

    //finalPrice: harga yang beneran dibayar customer
    public function getFinalPriceAttribute()
    {
        return $this->has_discount ? (int) $this->discount_price : ($this->price ? (int) $this->price : null);
    }

    //discountPercent: buat badge "Hemat X%"
    public function getDiscountPercentAttribute()
    {
        if (!$this->has_discount) {
            return 0;
        }

        return (int) round((($this->price - $this->discount_price) / $this->price) * 100);
    }

    //featureList: isi paket, 1 baris = 1 item
    public function getFeatureListAttribute()
    {
        if (!$this->features) {
            return [];
        }

        return collect(preg_split('/\r\n|\r|\n/', $this->features))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }

    //thumbnail: foto default, fallback foto pertama, fallback gambar default
    public function getThumbnailAttribute()
    {
        $gallery = $this->galleries->firstWhere('is_default', 1) ?? $this->galleries->first();

        return $gallery ? Storage::url($gallery->image) : asset('redesign/images/default-package.webp');
    }

    //brandName: nama merk, fallback buat paket universal
    public function getBrandNameAttribute()
    {
        return $this->carBrand->name ?? 'Semua Mobil';
    }
}
