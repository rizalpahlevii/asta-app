<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseType extends Model
{
    use HasFactory;
    public function franchises()
    {
        return $this->hasMany(Franchise::class, 'franchise_id', 'id');
    }
}
