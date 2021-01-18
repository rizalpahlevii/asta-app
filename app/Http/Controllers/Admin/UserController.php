<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Franchise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('franchise')->get();
        return view('pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $franchises = Franchise::whereNull('user_id')->get();
        return view('pages.admin.user.create', compact('franchises'));
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
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')],
            'password' => 'required|min:8',
            'role' => ['required', Rule::in(['admin', 'franchise'])]
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = 'admin';
        $user->save();

        Flashdata::success_alert("Success to create user");
        return redirect(route('admin.user.index'));
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
        $franchises = Franchise::whereNull('user_id')->orWhere('user_id', $id)->get();
        $user = User::find($id);
        return view('pages.admin.user.edit', compact('user', 'franchises'));
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
        $rules = [
            'name' => 'required|min:3',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')->ignore($id)],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')->ignore($id)],
        ];
        if ($request->password) {
            $rules['password'] = 'required|min:5';
        }
        $request->validate($rules);
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = $request->password;
        }
        $user->save();

        Flashdata::success_alert("Success to update user");
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();
        Flashdata::success_alert("Success to delete user");
        return redirect(route('admin.user.index'));
    }
}
