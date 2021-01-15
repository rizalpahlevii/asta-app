<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'address', 'phone', 'owner'];
    public function franchiseSuppliers()
    {
        return $this->hasMany(FranchiseSupplier::class, 'supplier_id', 'id');
    }
    public function rawMaterials()
    {
        return $this->hasMany(RawMaterial::class, 'supplier_id', 'id');
    }
}
