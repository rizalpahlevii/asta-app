<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseType extends Model
{
    use HasFactory;
    public function franchises()
    {
        return $this->hasMany(Franchise::class, 'franchise_type_id', 'id');
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($type) {
            $type->franchises->each(
                function ($franchise) {
                    $franchise->orders()->delete();
                    $franchise->employees()->delete();
                    $franchise->delete();
                    $franchise->user()->delete();
                }
            );
        });
    }
}
