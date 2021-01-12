<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'supplier_id', 'franchise_id', 'amount', 'unit', 'information', 'expired', 'deductions_per_transaction'];
    public function scopeWhereFranchise($query, $franchise_id)
    {
        return $query->where('franchise_id', $franchise_id);
    }
    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
