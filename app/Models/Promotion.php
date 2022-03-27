<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'promotion';

    protected $fillable = [
        'code',
        'percent',
        'content',
        'start_date',
        'end_date',
    ];

    protected $dates = ['deleted_at'];
}
