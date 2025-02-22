<?php

namespace App\Livewire\Filter;

use Livewire\Component;

class Colors extends Component
{
    public $colors;

    public function mount()
    {
        $this->colors = ['Green', 'Red', 'Yellow', 'Blue', 'Cyan', 'white', 'Black'];
    }

    public function render()
    {
        return view('livewire.filter.colors');
    }
}
