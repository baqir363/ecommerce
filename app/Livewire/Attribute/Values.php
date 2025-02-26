<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\AttributeValue;

class Values extends Component
{
    public $attribute;
    public $values;
    public $value;

    public function mount()
    {
        $this->values = $this->attribute->values;
    }
    public function add()
    {
        $validated = $this->validate([
            "value" => "required",
        ]);
        $this->attribute->values()->create($validated);
        $this->reset('value');
        $this->resetValues();
    }
    public function delete(AttributeValue $value)
    {
        $value->delete();
        $this->resetValues();
    }
    public function resetValues()
    {
        $this->values = AttributeValue::where('attribute_id', $this->attribute->id)->get();
    }
    public function render()
    {
        return view('livewire.attribute.values');
    }
}
