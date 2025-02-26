<div>

    <form wire:submit.prevent="add">
        <div class="row g-3">
            <div class="col">
                <label>SKU</label>
                <input type="text" wire:model="sku" class="form-control">
                @error('sku')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label>Name</label>
                <input type="text" wire:model="name" class="form-control">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label>Price</label>
                <input type="text" wire:model="price" class="form-control">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label>Selling Price</label>
                <input type="text" wire:model="selling_price" class="form-control">
                @error('selling_price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
        <input class="btn btn-primary my-3" type="submit" value="save">
    </form>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Selling Price</th>
        </tr>
        @foreach ($varients as $varient)
            <tr>
                <td>{{ $varient->name }} </td>
                <td>{{ $varient->sku }} </td>
                <td>{{ $varient->price }} </td>
                <td>{{ $varient->selling_price }} </td>
                <td><a class="text-danger" wire:click="delete({{ $varient->id }})"><i class="far fa-trash-alt"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
