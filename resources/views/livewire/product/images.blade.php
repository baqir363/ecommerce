<div>
    <h5>Images</h5>
    @forelse ($product->images as $image)
        <img src="{{ asset('storage/'.$image->images)}}" class="w-25" alt="">
    @empty
        <div class="text-danger">No images found</div>
    @endforelse

    <form wire:submit.prevent="save">
        <input type="file" wire:model="image">

        @error('image') <span class="error">{{ $message}}</span>@enderror

        <button class="btn btn-sm btn-secondary" type="submit">Save Image</button>
    </form>
</div>
