<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
                'username' => ['required', Rule::unique('users', 'username')->ignore(auth()->user()->id)],
                'email' => ['required', Rule::unique('users', 'email')->ignore(auth()->user()->id)]

            ]
        );
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        Flashdata::success_alert("Success to update profile");
        return redirect(route('admin.setting.index'));
    }
    public function password()
    {
        return view('pages.admin.setting.password.index');
    }
    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'old_password' => 'required|min:5',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|min:5|same:password',
        ]);
        if ($request->password == $request->old_password) {
            Flashdata::danger_alert('New Password Same As Old Password!');
            return redirect()->back();
        }
        if (Hash::check($request->old_password, $user->password)) {
            $user = User::find($user->id);
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Flashdata::success_alert('Password successfully changed!');
                return redirect()->back();
            } else {
                Flashdata::danger_alert('Password Changed Failed!');
                return redirect()->back();
            }
        } else {
            Flashdata::danger_alert('Old Password Incorrect!');
            return redirect()->back();
        }
    }
}
