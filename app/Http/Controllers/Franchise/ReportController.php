<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::with('orderDetails.order')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.report.index', compact('products'));
    }
}
