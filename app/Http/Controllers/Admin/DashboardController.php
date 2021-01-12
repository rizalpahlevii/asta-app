<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $franchise = Franchise::get()->count();
        $supplier = Supplier::get()->count();
        $income = Order::get()->sum('total_pay');
        return view('pages.admin.dashboard', compact('franchise', 'supplier', 'income'));
    }
}
