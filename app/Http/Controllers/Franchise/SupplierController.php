<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\FranchiseSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = FranchiseSupplier::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $franchiseSuppliers = FranchiseSupplier::whereFranchise(auth()->user()->franchise->id)->get();
        $data = [];
        foreach ($franchiseSuppliers as $item) {
            $data[] = $item->supplier_id;
        }
        $suppliers = Supplier::whereNotIn('id', $data)->get();
        return view('pages.franchise.supplier.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['franchise_id' => auth()->user()->franchise->id]);
        $validated = $request->validate(['supplier_id' => 'required', 'franchise_id' => 'required']);
        $supplier = new FranchiseSupplier();
        $supplier->create($validated);
        Flashdata::success_alert("Success to add supplier");
        return redirect(route('franchise.supplier.index'));
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

        $franchiseSuppliers = FranchiseSupplier::whereFranchise(auth()->user()->franchise->id)->get();
        $data = [];
        foreach ($franchiseSuppliers as $item) {
            $data[] = $item->supplier_id;
        }
        $suppliers = Supplier::whereNotIn('id', $data)->get();
        $supplier = FranchiseSupplier::with('supplier')->findOrFail($id);
        return view('pages.franchise.supplier.edit', compact('suppliers', 'data', 'supplier'));
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
        $validated = $request->validate(['supplier_id' => 'required']);
        $supplier =  FranchiseSupplier::find($id);
        $supplier->update($validated);
        Flashdata::success_alert("Success to update supplier");
        return redirect(route('franchise.supplier.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier =  FranchiseSupplier::find($id);
        $supplier->delete();
        Flashdata::success_alert("Success to delete supplier");
        return redirect(route('franchise.supplier.index'));
    }
    public function downloadPdf()
    {
        $suppliers = Supplier::get();
        view()->share('suppliers', $suppliers);
        $pdf = PDF::loadView('pages.franchise.supplier.pdf', $suppliers);
        return $pdf->download('supplier_data.pdf');
    }
}
