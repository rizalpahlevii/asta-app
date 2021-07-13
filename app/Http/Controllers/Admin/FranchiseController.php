<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\FranchiseType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PDF;

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

    public function franchiseDataPdf()
    {
        $franchises = Franchise::with('franchiseType')->get();
        $pdf = PDF::loadView('pages.admin.franchise.franchise-pdf', ['franchises' => $franchises]);
        return $pdf->download('Franchise Data.pdf');
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
            'franchise_name' => 'required|min:3',
            'owner_name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:6',
            'name' => 'required|min:3',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')],
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = 'franchise';
        $user->save();

        $franchise = new Franchise();
        $franchise->franchise_type_id = $request->type;
        $franchise->name = $request->franchise_name;
        $franchise->owner_name = $request->owner_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $franchise->user_id = $user->id;
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
        $user = User::find($franchise->user_id);
        return view('pages.admin.franchise.edit', compact('users', 'types', 'franchise', 'user'));
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
        $franchise = Franchise::find($id);
        $validator = [
            'type' => 'required',
            'franchise_name' => 'required|min:3',
            'owner_name' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|min:6',
            'name' => 'required|min:3',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')->ignore($franchise->user_id)],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')->ignore($franchise->user_id)],
        ];
        if ($request->password) {
            $validator['password'] = 'required|min:8';
        }
        $request->validate($validator);
        $franchise->franchise_type_id = $request->type;
        $franchise->name = $request->franchise_name;
        $franchise->owner_name = $request->owner_name;
        $franchise->address = $request->address;
        $franchise->phone = $request->phone;
        $user =  User::find($franchise->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();
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

    public function income($id)
    {
        $year = Order::select(DB::raw('YEAR(created_at) as year'))->distinct()->get();
        $data = Order::selectRaw('year(order_date) as year, monthname(order_date) as month,sum(total_pay) as income')->whereFranchise($id);
        if (request()->get('filter_by')) {
            if (request()->get('filter_by') == "year") {
                $data = $data->whereYear('order_date', request()->get('year'));
            } elseif (request()->get('filter_by') == "month") {
                $data = $data->whereYear('order_date', request()->get('year'));
                $data = $data->whereMonth('order_date', request()->get('month'));
            } elseif (request()->get('filter_by') == "date") {
                $data = $data->where('order_date', '>=', request()->get('start'));
                $data = $data->where('order_date', '<=', request()->get('end'));
            }
        }
        $data = $data->groupBy('year', 'month')
            ->orderBy('month', 'desc')->get();
        $franchise = Franchise::find($id);
        return view('pages.admin.franchise.income', compact('data', 'franchise', 'year'));
    }
    public function pdf($id)
    {
        $data = Order::selectRaw('year(order_date) as year, monthname(order_date) as month,sum(total_pay) as income')->whereFranchise($id);
        if (request()->get('filter_by')) {
            if (request()->get('filter_by') == "year") {
                $data = $data->whereYear('order_date', request()->get('year'));
            } elseif (request()->get('filter_by') == "month") {
                $data = $data->whereYear('order_date', request()->get('year'));
                $data = $data->whereMonth('order_date', request()->get('month'));
            } elseif (request()->get('filter_by') == "date") {
                $data = $data->where('order_date', '>=', request()->get('start'));
                $data = $data->where('order_date', '<=', request()->get('end'));
            }
        }
        $data = $data->groupBy('year', 'month')
            ->orderBy('month', 'desc')->get();
        $franchise = Franchise::find($id);
        view()->share('franchise', $franchise);
        view()->share('data', $data);
        $pdf = PDF::loadView('pages.admin.franchise.pdf', compact('franchise', 'data'));
        return $pdf->download($franchise->name . '-income.pdf');
    }
}
