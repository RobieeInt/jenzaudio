<?php

namespace App\Models;

use App\Models\ProductGalleries;
use App\Models\ProductCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'slug',
        'price',
        'old_price',
        'tags',
        'star',
        'description',
        'short_description',
        'status',
        'popular',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategories::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGalleries::class, 'product_id');
    }

}
