<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\FranchiseType;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franchises = Franchise::with('franchiseType')->get();
        return view('pages.admin.franchise.index', compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'franchise')->doesntHave('franchise')->get();
        $types = FranchiseType::all();
        return view('pages.admin.franchise.create', compact('types', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required|min:3',
            'owner_name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:6'
        ]);
        $franchise = new Franchise();
        $franchise->franchise_type_id = $request->type;
        $franchise->name = $request->name;
        $franchise->owner_name = $request->owner_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        if ($franchise->save()) {
            Flashdata::success_alert("Success to create Franchise");
        } else {
            Flashdata::success_alert("Cannot to create Franchise");
        }
        return redirect(route('admin.franchise.index'));
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
        $users = User::where('role', 'franchise')->doesntHave('franchise')->get();
        $types = FranchiseType::all();
        $franchise = Franchise::with('user')->find($id);
        return view('pages.admin.franchise.edit', compact('users', 'types', 'franchise'));
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
        $request->validate([
            'type' => 'required',
            'name' => 'required|min:3',
            'owner_name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:6',

        ]);
        $franchise = Franchise::find($id);
        $franchise->franchise_type_id = $request->type;
        $franchise->name = $request->name;
        $franchise->owner_name = $request->owner_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        if ($franchise->save()) {
            Flashdata::success_alert("Success to update Franchise");
        } else {
            Flashdata::success_alert("Cannot to update Franchise");
        }
        return redirect(route('admin.franchise.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $franchise = Franchise::find($id);
        if ($franchise->delete()) {
            Flashdata::success_alert("Success to delete Franchise");
        } else {
            Flashdata::success_alert("Cannot to delete Franchise");
        }
        return redirect(route('admin.franchise.index'));
    }
}
