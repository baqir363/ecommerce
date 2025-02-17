<?php

namespace App\Livewire\Product;
use Illuminate\Http\Request;

use Livewire\Component;

class Option extends Component
{
    public $product;
    public $message;
    public $quantity;

    public function mount(Request $request)
    {
        $cart = array();
        if($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        }
        $this->quantity = 0;
        if(isset($cart[$this->product->id])){
            $this->quantity = $cart[$this->product->id];
        }
    }
    public function addToCart(Request $request)
    {
        // add to cart using session
        $cart = array();
        if($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        }
        if(isset($cart[$this->product->id])){
            $cart[$this->product->id] += 1;
        }else{
            $cart[$this->product->id] = 1;
        }
        $request->session()->put('cart', $cart);
        $this->quantity = $cart[$this->product->id];
        $this->dispatch('cartUpdate');
    }

    public function render()
    {
        return view('livewire.product.option');
    }
}
