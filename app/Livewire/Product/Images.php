<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;
    public $image;
    public $product;

    public function save(){
        $this->validate([
            'image' => 'image|max:1024',
        ]);

        $imagePath = $this->image->store('images','public');
        $image = $this->product->images()->create([
            'images' => $imagePath,
        ]);
        $this->product = \App\Models\Product::where('id',$this->product->id)->first();
    }

    public function render()
    {
        return view('livewire.product.images');
    }
}
