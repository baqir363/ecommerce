<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class Index extends Component
{
    public $cart;
    public $message;
    protected $listeners = ['cartUpdate' => 'updateCartItems'];

    public function mount(){
        $this->cart = array();
        if(session('cart')){
            $this->cart = session('cart');
        }
    }

    public function updateCartItems()
    {
        $this->cart = session('cart');
    }

    public function render()
    {
        return view('livewire.cart.index');
    }
}
