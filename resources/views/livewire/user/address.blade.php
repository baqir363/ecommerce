<div class="row">
    @forelse (Auth::user()->address as $address)
            <div class="col-md-4">
                <input type="radio" name="shipping_address" value="{{ $address->id }}"><br>
                {{ $address->name }}, {{ $address->contact }},<br>
                {{ $address->line1 }},<br>
                {{ $address->line2 }},<br>
            </div>
    @empty
        <div class="alert alert-danger">No address found for account.</div>
    @endforelse

    @if($new)
        <form wire:submit.prevent="save" class="row g-3 mb-5">
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" wire:model="name" id="name">
                @error('name') <span class="text-danger">{{ $message}}</span>@enderror
            </div>
            <div class="col-md-6">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" wire:model="contact" id="contact">
                @error('contact') <span class="text-danger">{{ $message}}</span>@enderror
            </div>
            <div class="col-12">
                <label for="line1" class="form-label">Address line 1</label>
                <input type="text" class="form-control" wire:model="line1" id="line1" placeholder="1234 Main St">
                @error('line1') <span class="text-danger">{{ $message}}</span>@enderror
            </div>
            <div class="col-12">
                <label for="line2" class="form-label">Address line 2</label>
                <input type="text" class="form-control" wire:model="line2" id="line2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city">
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <select id="state" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="zip" class="form-label">Zip/Pin</label>
                <input type="text" class="form-control" wire:model="zip" id="zip">
                @error('zip') <span class="text-danger">{{ $message}}</span>@enderror
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    Use as default address
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    @endif
    <a wire:click="addNew" class="btn btn-secondary btn-sm">Add New Address</a>
</div>
