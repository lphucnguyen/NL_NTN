<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product';

    protected $dates = ['deleted_at'];

    public function scopePrice($query, $prices) {
        if(count($prices) > 0 && $prices[1] == 0){
            $query->where('price', '>=', $prices[0]);
        }
        else if(count($prices) > 0 && $prices[0] != 'all'){
            $query->whereBetween('price', $prices);
        }

        return $query;
    }

    public function scopeType($query, $type) {
        if($type != 0){
            $query->where('type', $type);
        }

        return $query;
    }

    public function scopeNewest($query, $orderBy) {
        if($orderBy != 'all'){
            $query->latest();
        }

        return $query;
    }

    public function scopeOrderByPrice($query, $orderByPrice) {
        if($orderByPrice != 'all'){
            $query->orderBy('price', $orderByPrice);
        }

        return $query;
    }

    public function scopeSearchName($query, $search) {
        if($search != ''){
            $query->where('name', 'like', "%$search%");
        }

        return $query;
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(ProductType::class, 'type');
    }

    public function evaluates()
    {
        return $this->hasMany(Evaluate::class, 'product_id', 'id');
    }
}
