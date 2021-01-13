<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\FranchiseSupplier;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $order = Order::whereFranchise(auth()->user()->franchise->id)->get()->count();
        $supplier = FranchiseSupplier::whereFranchise(auth()->user()->franchise->id)->count();
        $product = Product::whereFranchise(auth()->user()->franchise->id)->count();
        $income = Order::whereFranchise(auth()->user()->franchise->id)->get()->sum('total_pay');
        return view("pages.franchise.dashboard", compact('order', 'supplier', 'product', 'income'));
    }
    public function getData()
    {
        if (request()->get('order_count')) {
            if (request()->get('order_count') == "all") {
                $data = Order::whereFranchise(auth()->user()->franchise->id)->get()->count();
            } else {
                $date = Carbon::today()->subDay(request()->get('order_count'));
                $data = Order::where('created_at', '>=', $date)->whereFranchise(auth()->user()->franchise->id)->get()->count();
            }
        }
        return response()->json($data);
    }
    public function getChartData()
    {
        $labels = [];
        $data = [];
        $orders = Order::select('order_date')
            ->selectRaw('count(id) as total')
            ->whereFranchise(auth()->user()->franchise->id);
        if (request()->get('order_count') != "all") {
            $orders = $orders->where('created_at', '>=', Carbon::today()->subDay(request()->get('order_count')));
        }
        $orders = $orders->groupBy('order_date')
            ->orderBy('order_date')->get();
        return response()->json($orders);
    }
}
