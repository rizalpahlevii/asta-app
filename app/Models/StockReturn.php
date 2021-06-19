<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReturn extends Model
{
    use HasFactory;

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'raw_material_id', 'id');
    }
}
