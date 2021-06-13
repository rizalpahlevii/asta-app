<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FranchiseType;
use App\Helpers\Flashdata;
use Illuminate\Http\Request;
use PDF;

class FranchiseTypeController extends Controller
{
    public function index()
    {
        $types = FranchiseType::all();
        return view('pages.admin.franchise.type.index', compact('types'));
    }
    public function pdf()
    {
        $types = FranchiseType::all();
        $pdf = PDF::loadView('pages.admin.franchise.type.pdf', ['types' => $types]);
        return $pdf->download('Franchise Type Data.pdf');
    }

    public function create()
    {
        return view('pages.admin.franchise.type.create');
    }

    public function edit($id)
    {
        $type = FranchiseType::find($id);
        return view('pages.admin.franchise.type.edit', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $type = new FranchiseType();
        $type->name = $request->name;
        if ($type->save()) {

            Flashdata::success_alert("Success to create Franchise Type");
        } else {
            Flashdata::danger_alert("Cannot to create Franchise Type");
        }
        return redirect(route('admin.franchise.type.index'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $type =  FranchiseType::find($id);
        $type->name = $request->name;
        if ($type->save()) {
            Flashdata::success_alert("Success to update Franchise Type");
        } else {
            Flashdata::danger_alert("Cannot to update Franchise Type");
        }
        return redirect(route('admin.franchise.type.index'));
    }

    public function destroy($id)
    {
        $type =  FranchiseType::find($id);
        if ($type->delete()) {
            Flashdata::success_alert("Success to delete Franchise Type");
        } else {
            Flashdata::danger_alert("Cannot to delete Franchise Type");
        }
        return redirect(route('admin.franchise.type.index'));
    }
}
