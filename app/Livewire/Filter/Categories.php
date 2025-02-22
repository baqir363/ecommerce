<?php

namespace App\Livewire\Filter;

use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = \App\Models\Category::get();
    }
    public function render()
    {
        return view('livewire.filter.categories');
    }
}
