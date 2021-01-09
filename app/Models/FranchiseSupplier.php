<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseSupplier extends Model
{
    use HasFactory;
    protected $fillable = ['franchise_id', 'supplier_id'];
    public function scopeWhereFranchise($query, $franchise_id)
    {
        return $query->where('franchise_id', $franchise_id);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
