<?php

namespace App\Livewire\Product;
use Illuminate\Http\Request;

use Livewire\Component;

class Option extends Component
{
    public $product;
    public $message;

    public function addToCart(Request $request)
    {
        // add to cart using session
        $cart = array();
        if($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        }
        $cart[$this->product->id] = 1;
        $request->session()->put('cart', $cart);
        $this->emit('cartUpdate');
    }

    public function render()
    {
        return view('livewire.product.option');
    }
}
