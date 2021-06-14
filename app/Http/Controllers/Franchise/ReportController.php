<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\RawMaterial;
use Carbon\Carbon;
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
    public function perProduct($productId)
    {
        $product = Product::find($productId);
        $orders = Order::where('franchise_id', auth()->user()->franchise->id);
        $orders = $orders->with(['orderDetails' => function ($query) use ($productId) {
            $query->where('product_id', $productId);
        }]);
        if (request()->get('month') && request()->get('year')) {
            $orders = $orders->whereMonth('order_date', request()->get('month'));
            $orders = $orders->whereYear('order_date', request()->get('year'));
        }
        $orders = $orders->get();
        $pdf = PDF::loadView('pages.franchise.report.per_product_pdf', ['orders' => $orders, 'product' => $product]);
        return $pdf->download('report.pdf');
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

    public function material()
    {
        $materials = RawMaterial::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.report.material.index', compact('materials'));
    }

    public function materialPdf()
    {
        $materials = RawMaterial::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        $pdf = PDF::loadView('pages.franchise.report.material.pdf', ['materials' => $materials]);
        return $pdf->download('Incoming Material Report.pdf');
    }

    public function transaction()
    {
        $year = Order::select(DB::raw('YEAR(created_at) as year'))->whereFranchise(auth()->user()->franchise->id)->distinct()->get();
        $employees = Employee::where('franchise_id', auth()->user()->franchise->id)->get();
        $orders = Order::whereFranchise(auth()->user()->franchise->id);
        if (request()->get('filter_by')) {
            if (request()->get('filter_by') == "employee") {
                $orders = $orders->where('employee_id', request()->get('employee'));
            } elseif (request()->get('filter_by') == "date") {
                $orders = $orders->where('order_date', '>=', request()->get('start'))->where('order_date', '<=', request()->get('end'));
            } elseif (request()->get('filter_by') == "month") {
                $orders = $orders->whereMonth('order_date', request()->get('month'));
            } elseif (request()->get('filter_by') == "year") {
                $orders = $orders->whereYear('order_date', request()->get('year'));
            }
        }

        if (request()->get('limit')) {
            $orders = $orders->limit(request()->get('limit'));
        }
        $orders = $orders->orderBy('created_at', 'desc')->get();
        return view('pages.franchise.report.transaction.index', compact('orders', 'year', 'employees'));
    }
    public function transactionPdf()
    {

        $orders = Order::whereFranchise(auth()->user()->franchise->id);
        if (request()->get('filter_by')) {
            if (request()->get('filter_by') == "employee") {
                $orders = $orders->where('employee_id', request()->get('employee'));
            } elseif (request()->get('filter_by') == "date") {
                $orders = $orders->where('order_date', '>=', request()->get('start'))->where('order_date', '<=', request()->get('end'));
            } elseif (request()->get('filter_by') == "month") {
                $orders = $orders->whereMonth('order_date', request()->get('month'));
            } elseif (request()->get('filter_by') == "year") {
                $orders = $orders->whereYear('order_date', request()->get('year'));
            }
        }
        if (request()->get('limit')) {
            $orders = $orders->limit(request()->get('limit'));
        }
        $employee = Employee::find(request()->get('employee'));
        $orders = $orders->orderBy('created_at', 'desc')->get();
        view()->share('orders', $orders);
        $pdf = PDF::loadView('pages.franchise.report.transaction.pdf', ['orders' => $orders, 'employee' => $employee]);
        return $pdf->download('report.pdf');
    }
}
