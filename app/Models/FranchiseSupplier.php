<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseSupplier extends Model
{
    use HasFactory;
    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id', 'id');
    }
    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'id');
    }
}
