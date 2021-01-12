<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $order = Order::whereFranchise(auth()->user()->franchise->id)->get()->count();
        return view("pages.franchise.dashboard", compact('order'));
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
}
