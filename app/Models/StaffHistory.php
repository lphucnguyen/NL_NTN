<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'staff_history';

    protected $dates = ['deleted_at'];

}
