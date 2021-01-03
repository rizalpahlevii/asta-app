<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialReturn extends Model
{
    use HasFactory;
    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id', 'id');
    }
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'raw_material_id', 'id');
    }
}
