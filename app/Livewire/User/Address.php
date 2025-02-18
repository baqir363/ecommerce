<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Address extends Component
{
    public $new;
    public $name;
    public $contact;
    public $line1;
    public $line2;
    public $zip;



    public function mount(){
        $this->new = false;
    }
    public function addNew(){
        $this->new = true;
    }
    public function save(){
        $validated = $this->validate([
            'name' => 'required',
            'contact' => 'required',
            'line1' => 'required',
            'zip' => 'required|integer',
        ]);
        $address = Auth::user()->address()->create($validated);
        $this->new = false;

    }
    public function render()
    {
        return view('livewire.user.address');
    }
}
