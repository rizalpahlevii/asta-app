<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $year = Order::select(DB::raw('YEAR(created_at) as year'))->whereFranchise(auth()->user()->franchise->id)->distinct()->get();
        $products = Product::whereNotNull('id');
        if (request()->get('month') && request()->get('year')) {
            $products = $products->with(['orderDetails' => function ($query) {
                $query->whereMonth('created_at', request()->get('month'));
                $query->whereYear('created_at', request()->get('year'));
            }]);
        }
        $products = $products->whereFranchise(auth()->user()->franchise->id);
        if (request()->get('limit')) {
            $products = $products->limit(request()->get('limit'));
        }
        $products = $products->get();
        return view('pages.franchise.report.index', compact('products', 'year'));
    }
    public function pdf()
    {
        $products = Product::whereNotNull('id');
        if (request()->get('month') && request()->get('year')) {
            $products = $products->with(['orderDetails' => function ($query) {
                $query->whereMonth('created_at', request()->get('month'));
                $query->whereYear('created_at', request()->get('year'));
            }]);
        }
        $products = $products->whereFranchise(auth()->user()->franchise->id);
        if (request()->get('limit')) {
            $products = $products->limit(request()->get('limit'));
        }
        $products = $products->get();
        view()->share('products', $products);
        $pdf = PDF::loadView('pages.franchise.report.pdf', $products);
        return $pdf->download('report.pdf');
    }
    public function transaction()
    {
        $year = Order::select(DB::raw('YEAR(created_at) as year'))->whereFranchise(auth()->user()->franchise->id)->distinct()->get();

        $orders = Order::whereFranchise(auth()->user()->franchise->id);
        if (request()->get('month') && request()->get('year')) {
            $orders = $orders->whereMonth('order_date', request()->get('month'));
            $orders = $orders->whereYear('order_date', request()->get('year'));
        }
        if (request()->get('limit')) {
            $orders = $orders->limit(request()->get('limit'));
        }
        $orders = $orders->get();
        return view('pages.franchise.report.transaction.index', compact('orders', 'year'));
    }
    public function transactionPdf()
    {

        $orders = Order::whereFranchise(auth()->user()->franchise->id);
        if (request()->get('month') && request()->get('year')) {
            $orders = $orders->whereMonth('order_date', request()->get('month'));
            $orders = $orders->whereYear('order_date', request()->get('year'));
        }
        if (request()->get('limit')) {
            $orders = $orders->limit(request()->get('limit'));
        }
        $orders = $orders->get();
        view()->share('orders', $orders);
        $pdf = PDF::loadView('pages.franchise.report.transaction.pdf', $orders);
        return $pdf->download('report.pdf');
    }
}
