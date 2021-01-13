<?php

namespace App\Http\Controllers\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

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
        $order->date = Carbon::now()->format('Y-m-d');
        $order->pay = $request->pay;
        $order->normal_price = $normal_price;
        $order->discount = $discount;
        if ($request['order_data']) {
            $voucher = Voucher::find($request['order_data']['voucher_id']);
            if ($voucher->type == "percent") {
                $order->voucher_discount = ($order->total_pay / 100) * $voucher->percent_value;
            } else {
                $order->voucher_discount = $voucher->nominal_value;
            }
            $order->voucher_id = $request['order_data']['voucher_id'];
        }
        $order->total_pay = $total_pay - $order->voucher_discount;
        $order->employee_id = $request->employee_id;
        $order->franchise_id = auth()->user()->franchise->id;
        $order->save();
        foreach ($request['products'] as $row) {
            $product = Product::with('productMaterials')->find($row['product_id']);
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->product_id = $row['product_id'];
            $detail->quantity = $row['quantity'];
            $detail->price = $product->price;
            $detail->discount = $product->discount;
            $detail->final_price = $product->final_price;
            $detail->subtotal = $row['subtotal'];
            $detail->discount_subtotal = $row['subtotal_discount'];
            $detail->save();
            $materials_id = [];
            foreach ($product->productMaterials as $item) {
                $materials_id[] = $item->raw_material_id;
            }
            self::updateMaterial($materials_id, $row['quantity']);
        }
        if ($request['order_data']) {
            self::updateVoucher($request['order_data']['voucher_id']);
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
    private static function updateVoucher($voucher_id)
    {
        $voucher = Voucher::find($voucher_id);
        $voucher->remaining_quota -= 1;
        $voucher->used_quota += 1;
        $voucher->save();
    }
    private static function updateMaterial($materials_id, $quantity)
    {
        foreach ($materials_id as $row) {
            $material = RawMaterial::find($row);
            $material->amount -= ($quantity * $material->deductions_per_transaction);
            $material->save();
        }
    }
    public function checkVoucher(Request $request)
    {
        $voucher = Voucher::whereFranchise(auth()->user()->franchise->id)
            ->whereDate('expired_at', '>=', Carbon::now()->format('Y-m-d'))
            ->where('code', $request->code)->first();
        if ($voucher) {
            if ($request->order_value >= $voucher->minimum_order) {
                if ($voucher->remaining_quota > 0) {
                    if ($voucher->type == 'percent') {
                        $status = true;
                        $message = "Success to add voucher";
                        $data = [
                            'id' => $voucher->id,
                            'name' => $voucher->name,
                            'nominal_value' => floor(($request->order_value / 100) * $voucher->percent_value),
                        ];
                    } else {

                        $status = true;
                        $message = "Success to add voucher";
                        $data = [
                            'id' => $voucher->id,
                            'name' => $voucher->name,
                            'nominal_value' =>  $voucher->nominal_value,
                        ];
                    }
                } else {
                    $status = false;
                    $message = 'Failed! Voucher quota has run out';
                    $data = [];
                }
            } else {
                $status = false;
                $message = 'Failed! Minimum order ' . $voucher->minimum_order;
                $data = [];
            }
        } else {
            $data = [];
            $status = false;
            $message = 'Voucher not found';
        }
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response);
    }
    public function struk($order_id)
    {
        $order = Order::with('orderDetails.product', 'employee')->find($order_id);
        view()->share('order', $order);
        $pdf = PDF::loadView('pages.franchise.order.pdf', $order);
        return $pdf->download('struk.pdf');
    }
}
