<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            "shipping_address" => "required",
            "payment_mode" => "required"
        ]);

        $total = 0;
        $mrp = 0;
        $items = array();
        foreach(Auth::user()->cart as $item){
            $product = \App\Models\Product::where('id', $item->product_id)->first();
            $total += ($product->selling_price*$item->quantity);
            $mrp += ($product->price*$item->quantity);

            $items[]=array(
                "product_id" => $product->id,
                "quantity" => $item->quantity,
                "selling_price" => $product->selling_price,
            );
        }
        $subtotal = $total;
        $shipping_charges = 0;
        $discount = $mrp - $subtotal;

        $shipping_address = \App\Models\Address::where("id",$validated['shipping_address'])->first();

        $data = array(
            "subtotal" => $subtotal,
            "amount" => $subtotal,
            "discount" => $discount,
            "payment_mode" => $validated['payment_mode'],
            "shipping_name" => $shipping_address->name,
            "shipping_contact" => $shipping_address->contact,
            "shipping_address" => $shipping_address->line1.", ".$shipping_address->line2,
            "shipping_city" => "kuchto",
            "shipping_pin" => $shipping_address->zip,
            "billing_name" => $shipping_address->name,
            "billing_contact" => $shipping_address->contact,
            "billing_address" => $shipping_address->line1.", ".$shipping_address->line2,
            "billing_city" => "kuchto",
            "billing_pin" => $shipping_address->zip,

        );

        $order = Auth::user()->orders()->create($data);

        $orderItem = $order->products()->attach($items);

        $deleted = \App\Models\Cart::where('user_id', Auth::id())->delete();
        $request->session()->forget('cart');

        if($request->payment_mode=='online'){
            return redirect(route('payment.pay',['order'=>$order->id]));
        }
        return redirect(route('payment.view',['order'=>$order->id]));
    }
}
