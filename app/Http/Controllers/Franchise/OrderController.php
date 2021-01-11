<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $employees = Employee::whereFranchise(auth()->user()->franchise->id)->get();
        $products = Product::whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.order.index', compact('products', 'employees'));
    }
    public function store(Request $request)
    {
        $total_pay = 0;
        $discount = 0;
        $normal_price = 0;
        $discount_voucher = 0;

        foreach ($request['products'] as $row) {
            $total_pay += $row['subtotal'];
            $normal_price += $row['price'] * $row['quantity'];
            $discount += $row['subtotal_discount'];
        }
        $order = new Order();
        $order->pay = $request->pay;
        $order->normal_price = $normal_price;
        $order->total_pay = $total_pay;
        $order->discount = $discount;
        if ($request['order_data']) {

            $order->discount_voucher = $request['order_data']['voucher_value'];
            $order->voucher_id = $request['order_data']['voucher_id'];
        }
        $order->employee_id = $request->employee_id;
        $order->franchise_id = auth()->user()->franchise->id;
        $order->save();
        foreach ($request['products'] as $row) {
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->product_id = $row['product_id'];
            $detail->quantity = $row['quantity'];
            $detail->subtotal = $row['subtotal'];
            $detail->save();
        }
        return response()->json(['status' => true, 'message' => 'Success to order']);
    }
    public function getProducts()
    {
        $products = Product::whereFranchise(auth()->user()->franchise->id);
        if (request()->get('keyword') != "") {
            $products = $products->where('name', 'like', '%' . request()->get('keyword') . '%');
        }
        $products = $products->get();
        return response()->json($products);
    }
    public function checkVoucher(Request $request)
    {
        $voucher = Voucher::whereFranchise(auth()->user()->franchise->id)
            ->whereDate('expired_at', '>=', Carbon::now()->format('Y-m-d'))
            ->where('code', $request->code)->first();
        if ($voucher) {
            if ($request->order_value >= $voucher->minimum_order) {
                if ($voucher->remaining_quota > 0) {
                    $status = true;
                    $message = 'Success add voucher to order';
                }
            } else {
                $status = false;
                $message = 'Failed! Minimum order ' . $voucher->minimum_order;
            }
        } else {
            $data = [];
            $status = false;
            $message = 'Voucher not found';
        }
        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $voucher
        ];
        return response()->json($data);
    }
}
