<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['code', 'name', 'percent_value', 'nominal_value', 'minimum_order', 'expired_at', 'remaining_quota', 'initial_quota'];
    use HasFactory;
    public function scopeWhereFranchise($query, $franchise_id)
    {
        return $query->where('franchise_id', $franchise_id);
    }
}
