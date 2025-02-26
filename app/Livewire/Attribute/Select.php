<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use App\Models\Attribute;

use Livewire\Features\SupportAttributes\AttributeCollection;
class Select extends Component
{
    public AttributeCollection $attributes;
    public string $search = '';

    public function mount()
    {
        $this->attributes = new AttributeCollection();
    }

    public function select($attributeId)
    {
        $attribute = Attribute::find($attributeId);

        if ($attribute && !$this->attributes->contains('id', $attributeId)) {
            $this->attributes->push($attribute);
        }

        // Sort attributes alphabetically after adding a new one
        $this->attributes = $this->attributes->sortBy('name');

        $this->reset('search');
    }
    public function render()
    {
        // Fetch selected attributes (they are already sorted)
        $attr = Attribute::whereIn('id', $this->attributes->pluck('id'))->get();

        // Search query
        $results = [];
        if ($this->search !== '') {
            $keywords = explode(' ', $this->search);
            $query = Attribute::where('name', 'like', '%' . $this->search . '%')->orderBy('name');

            foreach ($keywords as $word) {
                $query->orWhere('name', 'LIKE', '%' . $word . '%');
            }

            $results = $query->limit(6)->get();
        }

        return view('livewire.attribute.select', compact('results', 'attr'));
    }

}
