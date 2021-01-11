<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
    public function productMaterials()
    {
        return $this->hasMany(ProductMaterial::class, 'product_id', 'id');
    }
    public function scopeWhereFranchise($query, $franchise_id)
    {
        return $query->where('franchise_id', $franchise_id);
    }
}
