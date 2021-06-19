<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\RawMaterial;
use App\Models\StockReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StockReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawMaterialsId = RawMaterial::where('franchise_id', auth()->user()->franchise->id)->get('id')->toArray();
        $returns = StockReturn::with('rawMaterial.supplier')->whereIn('raw_material_id', $rawMaterialsId)->get();
        return view('pages.franchise.return.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterials = RawMaterial::where('franchise_id', auth()->user()->franchise->id)->get();
        return view('pages.franchise.return.create', compact('rawMaterials'));
    }

    public function getRawMaterialDetail($rawMaterialId)
    {
        $response = RawMaterial::find($rawMaterialId);
        return response()->json(json_decode($response->incoming_history, true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function pdf()
    {
        $rawMaterialsId = RawMaterial::where('franchise_id', auth()->user()->franchise->id)->get('id')->toArray();
        $returns = StockReturn::with('rawMaterial.supplier')->whereIn('raw_material_id', $rawMaterialsId)->get();
        $pdf = PDF::loadView('pages.franchise.return.pdf', ['returns' => $returns]);
        return $pdf->download('Return Report.pdf');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'raw_material_id' => 'required',
            'order_date' => 'required',
            'amount_order' => 'required',
            'amount_return' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $return = new StockReturn();
            $return->raw_material_id = $request->raw_material_id;
            $return->stock_entry_date = $request->order_date;
            $return->date = $request->date;
            $return->amount = $request->amount_return;
            $return->save();

            $rawMaterial = RawMaterial::find($request->raw_material_id);
            $json = json_decode($rawMaterial->incoming_history, true);
            foreach ($json as $key => $row) {
                if ($request->order_date == $row['date']) {
                    $json[$key]['stock'] -= $request->amount_return;
                }
            }
            $rawMaterial->incoming_history = json_encode($json);
            $rawMaterial->amount -= $request->amount_return;
            $rawMaterial->save();
            DB::commit();
            Flashdata::success_alert("Success to create return");
            return redirect(route('franchise.return.index'));
        } catch (\Throwable $th) {
            return redirect(route('franchise.return.index'));
        }
    }
}
