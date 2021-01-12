<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.franchise.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'code' => ['required', 'min:3', Rule::unique('vouchers', 'code')],
            'nominal_value' => 'required|numeric',
            'percent_value' => 'required|numeric',
            'minimum_order' => 'required|numeric',
            'initial_quota' => 'required|numeric',
            'expired_at' => 'required',
        ]);
        $voucher = new Voucher();
        $voucher->name = $request->name;
        $voucher->code = $request->code;
        $voucher->nominal_value = $request->nominal_value;
        $voucher->percent_value = $request->percent_value;
        $voucher->minimum_order = $request->minimum_order;
        $voucher->initial_quota = $request->initial_quota;
        $voucher->remaining_quota = $request->initial_quota;
        $voucher->expired_at = $request->expired_at;
        $voucher->franchise_id = auth()->user()->franchise->id;
        if ($request->percent_value > 0) {
            $voucher->type = 'percent';
        } else {
            $voucher->type = 'nominal';
        }
        $voucher->save();
        Flashdata::success_alert("Success to create voucher");
        return redirect(route('franchise.voucher.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher = Voucher::find($id);
        return view('pages.franchise.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'code' => ['required', 'min:3', Rule::unique('vouchers', 'code')->ignore($id)],
            'nominal_value' => 'required|numeric',
            'percent_value' => 'required|numeric',
            'minimum_order' => 'required|numeric',
            'remaining_quota' => 'required|numeric',
            'expired_at' => 'required',
        ]);
        $voucher =  Voucher::find($id);
        $voucher->name = $request->name;
        $voucher->code = $request->code;
        $voucher->nominal_value = $request->nominal_value;
        $voucher->percent_value = $request->percent_value;
        $voucher->minimum_order = $request->minimum_order;
        $voucher->remaining_quota = $request->remaining_quota;
        $voucher->expired_at = $request->expired_at;
        $voucher->franchise_id = auth()->user()->franchise->id;
        if ($request->percent_value > 0) {
            $voucher->type = 'percent';
        } else {
            $voucher->type = 'nominal';
        }
        $voucher->save();
        Flashdata::success_alert("Success to update voucher");
        return redirect(route('franchise.voucher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();
        Flashdata::success_alert("Success to delete voucher");
        return redirect(route('franchise.voucher.index'));
    }
}
