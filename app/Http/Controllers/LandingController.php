<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->back();
        }
        return view('pages.landing.index');
    }
    public function about()
    {
        if (auth()->user()) {
            return redirect()->back();
        }
        return view('pages.landing.about');
    }
}
