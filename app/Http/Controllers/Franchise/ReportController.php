<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
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
        return view('pages.franchise.report.index', compact('products'));
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
}
