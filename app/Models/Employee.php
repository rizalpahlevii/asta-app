<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gender', 'franchise_id', 'phone', 'address'];
    public function scopeWhereFranchise($query, $franchise_id)
    {
        return $query->where('franchise_id', $franchise_id);
    }
    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
}
