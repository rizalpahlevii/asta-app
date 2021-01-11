<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.admin.setting.index');
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3',
                'username' => ['required', Rule::unique('users', 'username')->ignore(auth()->user()->id)]
            ]
        );
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();
        Flashdata::success_alert("Success to update profile");
        return redirect(route('admin.setting.index'));
    }
}
