<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class Total extends Component
{
    public $subtotal;
    public $count;

    protected $listeners = ['cartUpdate' => 'updateCartItems'];
    public function mount()
    {
        $this->updateCartItems();
    }
    public function updateCartItems()
    {
        $cart = session('cart');
        $this->count = sizeof($cart);

        $total = 0;
        foreach($cart as $productId=>$quantity){
            $product = \App\Models\Product::where('id', $productId)->first();
            $total += ($product->selling_price*$quantity);
        }
        $this->subtotal = $total;
    }
    public function render()
    {
        return view('livewire.cart.total');
    }
}
