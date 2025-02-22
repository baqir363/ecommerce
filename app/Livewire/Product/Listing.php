<?php

namespace App\Livewire\Product;
use Livewire\WithPagination;
use Livewire\Component;

class Listing extends Component
{
    use WithPagination;

    public function render()
    {

        $products = \App\Models\Product::paginate(10);
        return view('livewire.product.listing',compact('products'));
    }
}
