<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\City;

class Address extends Component
{
    public $new;
    public $name;
    public $contact;
    public $line1;
    public $line2;
    public $zip;
    public $country;
    public $state;
    public $city;



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
         $states = \App\Models\State::where('country_id','167')->get();
         $cities = array();
         if($this->state){
            $cities = \App\Models\City::where('state_id',$this->state)->get();
         }
        return view('livewire.user.address',compact('states','cities'));
    }
}
