<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $fillable = [
        'name',
        'email',
        'message',
        'address',
        'telp',
        'phone',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'whatsapp',
        'image',
        'linkvideo',
    ];
}
