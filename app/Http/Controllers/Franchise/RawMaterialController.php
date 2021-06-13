<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\FranchiseSupplier;
use App\Models\RawMaterial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = RawMaterial::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.material.index', compact('materials'));
    }

    public function pdf()
    {
        $materials = RawMaterial::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        $pdf = PDF::loadView('pages.franchise.material.pdf', ['materials' => $materials]);
        return $pdf->download('Material Report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = FranchiseSupplier::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.material.create', compact('suppliers'));
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
        $request->merge(['incoming_history' => json_encode([['date' => Carbon::now()->toDateString(), 'stock' => $request->amount]])]);
        $validated = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'amount' => 'required',
            'expired' => 'required',
            'unit' => 'required',
            'information' => 'required',
            'franchise_id' => 'required',
            'incoming_history' => 'required',
            'deductions_per_transaction' => 'required'
        ]);

        $material = new RawMaterial();
        $material->create($validated);
        Flashdata::success_alert("Success to add Material");
        return redirect(route('franchise.material.index'));
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
        $suppliers = FranchiseSupplier::with('supplier')->whereFranchise(auth()->user()->franchise->id)->get();
        $material = RawMaterial::find($id);
        return view('pages.franchise.material.edit', compact('suppliers', 'material'));
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
        $request->merge(['franchise_id' => auth()->user()->franchise->id]);
        $validated = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'amount' => 'required',
            'expired' => 'required',
            'unit' => 'required',
            'information' => 'required',
            'franchise_id' => 'required',
            'deductions_per_transaction' => 'required'
        ]);
        $material =  RawMaterial::find($id);
        $material->update($validated);
        if ($material->incoming_history == null) {
            $json = [
                ['date' => Carbon::now()->toDateString(), 'stock' => $request->amount]
            ];
        } {
            $oldJson = json_decode($material->incoming_history, true);
            $oldJson[] =
                ['date' => Carbon::now()->toDateString(), 'stock' => $request->amount];
            $json = json_encode($oldJson);
        }
        $material->incoming_history = $json;
        $material->save();
        Flashdata::success_alert("Success to update Material");
        return redirect(route('franchise.material.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = RawMaterial::find($id);
        $material->delete();
        Flashdata::success_alert("Success to delete material");
        return redirect(route('admin.material.index'));
    }
}
