<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function franchiseType()
    {
        return $this->belongsTo(FranchiseType::class, 'franchise_type_id', 'id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'franchise_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'franchise_id', 'id');
    }
}
