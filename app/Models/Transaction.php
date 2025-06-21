<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'transaction';
    protected $fillable = [
        'user_id',
        'invoice_number',
        'shipping_price',
        'insurance_price',
        'total_price',
        'transaction_status',
        'payment_status',
        'resi',
        'payment_url',
        'payment_method',
        'payment_date,',
        'updated_at',
        'created_at',
    ];
}
