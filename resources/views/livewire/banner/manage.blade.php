<div>
    @forelse ($banners as $banner)
        @livewire('banner.show', ['banner' => $banner], key($banner->id))

    @empty
        <div class="text-danger">No banners found</div>
    @endforelse

    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" wire:model="name" class="form-control">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="link">Link</label>
            <input type="text" name="link" wire:model="link" class="form-control">
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="file" wire:model="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-sm btn-primary" type="submit">Save Banner</button>
    </form>
</div>
