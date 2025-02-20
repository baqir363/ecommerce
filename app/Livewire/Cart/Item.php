<?php

namespace App\Livewire\Cart;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Item extends Component
{
    public $productId;
    public $quantity;

    public function mount()
    {
        $cart = session('cart');
        $this->quantity = $cart[$this->productId];
    }

    public function plus(Request $request)
    {
        $cart = session('cart');
        $cart[$this->productId] = $cart[$this->productId]+1;
        $request->session()->put('cart', $cart);
        $this->quantity = $cart[$this->productId];
        $this->dispatch('cartUpdate');
    }

    public function minus(Request $request)
    {
        $cart = session('cart');
        $cart[$this->productId] = $cart[$this->productId]-1;
        $this->quantity = $cart[$this->productId];
        if( $cart[$this->productId]==0)
        {
            unset($cart[$this->productId]);
        }
        $request->session()->put('cart', $cart);
        $this->dispatch('cartUpdate');
    }

      public function remove(Request $request)
      {
        $cart = session('cart');
        unset($cart[$this->productId]);
        $request->session()->put('cart', $cart);

        $remove = \App\Models\Cart::where('user_id', Auth::id())->where('product_id', $this->productId)->delete();
        $this->dispatch('cartUpdate');
    }

    public function render()
    {
        $product = \App\Models\Product::where('id', '=', $this->productId)->first();
        return view('livewire.cart.item', compact('product'));
    }
}
