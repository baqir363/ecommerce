<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $latest = \App\Models\Product::latest()->limit(4)->get();
        return view('home', compact('latest'));
    }
}
