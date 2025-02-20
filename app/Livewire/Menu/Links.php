<?php

namespace App\Livewire\Menu;

use Livewire\Component;

class Links extends Component
{
    public $name;
    public $menu;

    public function mount()
    {
        $this->menu= \App\Models\Menu::where('name', $this->name)->first();
    }

    public function render()
    {
        return view('livewire.menu.links');
    }
}
