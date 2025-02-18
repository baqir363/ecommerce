<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        return view('cart.index');
    }

    public function checkout()
    {
        $cart = Cart::where('user_id',Auth::id())->get();
        return view('cart.checkout' ,compact('cart'));
    }
}
