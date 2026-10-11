<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageGalleries extends Model
{
    use HasFactory;
    protected $table = 'package_galleries';
    protected $fillable = [
        'package_id',
        'image',
        'is_default',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
