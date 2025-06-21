<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',
        'description',
        'author',
        'status',
        'popular',
        'tags',
        'meta_keyword',
        'meta_description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
