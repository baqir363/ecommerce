<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\Varient;


class Varients extends Component
{
    public $product;
    public $varients;
    public $sku, $name, $price, $selling_price;

    public function mount()
    {
        $this->varients = $this->product->varients;
    }
    public function add()
    {
        $validated = $this->validate([
            "sku" => "required|unique:varients",
            "name" => "required",
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'selling_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $this->product->varients()->create($validated);
        $this->reset('sku', 'name', 'price', 'selling_price');
        $this->resetValues();
    }
    public function delete(Varient $varient)
    {
        $varient->delete();
        $this->resetValues();
    }
    public function resetValues()
    {
        $this->varients = Varient::where('product_id', $this->product->id)->get();
    }
    public function render()
    {
        return view('livewire.product.varients');
    }
}
