<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'evaluate';
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'content',
        'start',
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
