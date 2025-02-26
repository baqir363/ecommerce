<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        $products = [];
        if($this->search!=''){

            $keyword = explode(' ', $this->search);

            $products = Product::where('name', 'like', '%'. $this->search.'%');
            if(sizeof($keyword)>1){
                foreach($keyword as $val){
                    $products = $products->orwhere('name', 'LIKE', '%'.$val.'%');
                }
            }
            $products = $products->limit(6)->get();
        }
        return view('livewire.search', compact('products'));
    }
}
