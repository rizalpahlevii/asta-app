<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\Order;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $franchise = Franchise::get()->count();
        $supplier = Supplier::get()->count();
        $income = Order::get()->sum('total_pay');
        $user = User::get()->count();
        return view('pages.admin.dashboard', compact('franchise', 'supplier', 'income', 'user'));
    }
}
