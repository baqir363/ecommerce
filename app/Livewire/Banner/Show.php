<?php

namespace App\Livewire\Banner;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $banner;


    public function delete()
    {
        Storage::disk('public')->delete($this->banner->image);
        $this->banner->delete();
        $this->dispatch('bannerUpdate');
    }

    public function render()
    {
        return view('livewire.banner.show');
    }
}
