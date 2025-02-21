<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $latest = \App\Models\Product::latest()->limit(4)->get();
        $banners = \App\Models\Banner::latest()->limit(4)->get();

        $collections = \App\Models\Collection::get();
        return view('home', compact('latest','banners','collections'));
    }

    public function dashboard()
    {
        return view('account.dashboard');
    }
}
