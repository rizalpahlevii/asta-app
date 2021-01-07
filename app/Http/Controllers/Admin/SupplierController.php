<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::get();
        return view('pages.admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate(
            [
                'name' => 'required|min:3',
                'address' => 'required|min:4',
                'phone' => 'required|min:3',
                'owner' => 'required'
            ],
        );
        $supplier = new Supplier();
        $supplier->create($validated);
        Flashdata::success_alert("Success to create supplier");
        return redirect(route('admin.supplier.index'));
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
        $supplier = Supplier::find($id);
        return view('pages.admin.supplier.edit', compact('supplier'));
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
        $validated =  $request->validate(
            [
                'name' => 'required|min:3',
                'address' => 'required|min:4',
                'phone' => 'required|min:3',
                'owner' => 'required'
            ],
        );
        $supplier =  Supplier::find($id);
        $supplier->update($validated);
        Flashdata::success_alert("Success to update supplier");
        return redirect(route('admin.supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        Flashdata::success_alert("Success to delete supplier");
        return redirect(route('admin.supplier.index'));
    }
}
