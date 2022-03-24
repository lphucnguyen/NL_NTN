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
}
