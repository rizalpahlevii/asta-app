<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone', 'owner'];
    public function franchiseSuppliers()
    {
        return $this->hasMany(FranchiseSupplier::class, 'supplier_id', 'id');
    }
}
