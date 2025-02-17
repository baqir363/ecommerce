<?php

namespace App\Livewire\Cart;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Livewire\Component;

class Preview extends Component
{
    public $count;
    protected $listeners = ['cartUpdate' => 'updateCartItems'];

    public function mount(Request $request){
        $this->count = 0;
        $cart = array();

        if(session('cart')){
            $cart = session('cart');
        }
        if(Auth::check()){
            foreach(Auth::user()->cart as $row){
                $cart[$row->product_id]=$row->quantity;
               }
        }

        $request->session()->put('cart', $cart);

        $this->count = sizeof($cart);
    }

    public function updateCartItems()
    {
        $this->count = sizeof(session('cart'));
        if(Auth::check()) {
        foreach(session('cart') as $productId => $quantity){
            $item = \App\Models\Cart::firstOrNew(
                ['user_id' => Auth::id(), 'product_id' => $productId]
            );
            $item->quantity = $quantity;
            $item->save();
           }
        }
    }

    public function render()
    {
        return view('livewire.cart.preview');
    }
}
