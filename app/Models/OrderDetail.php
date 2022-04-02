<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_detail';

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'amount'
    ];

    protected $dates = ['deleted_at'];

}
