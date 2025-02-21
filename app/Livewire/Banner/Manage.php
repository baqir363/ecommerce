<?php

namespace App\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;

class Manage extends Component
{
    use WithFileUploads;
    public $link;
    public $image;
    public $name;
    public $banners;


    protected $listeners = ['bannerUpdate' => 'updateBanners'];

    public function mount()
    {
        $this->banners = \App\Models\Banner::latest()->get();
    }

    public function updateBanners()
    {
        $this->banners = \App\Models\Banner::latest()->get();
    }

    public function save(){
        $validated = $this->validate([
            'image' => 'image|max:1024',
            'name' => 'required',
            'link' => 'required',
        ]);

        $imagePath = $this->image->store('banners','public');
        $validated['image'] = $imagePath;
        $banner = \App\Models\Banner::create($validated);
        $this->banners = \App\Models\Banner::latest()->get();
    }

    public function render()
    {
        return view('livewire.banner.manage');
    }
}
