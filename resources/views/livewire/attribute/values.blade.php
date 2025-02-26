<div>

    <form wire:submit.prevent="add">
        <div class="mb-3">
            <label>Value</label>
            <input type="text" wire:model="value" class="form-control">
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input class="btn btn-primary" type="submit" value="save">
    </form>
    <table class="table table-striped">
        @foreach ($values as $value)
            <tr>
                <td>{{ $value->value }} </td>
                <td><a class="text-danger" wire:click="delete({{ $value->id }})"><i class="far fa-trash-alt"></i>Delete</a></td>
            </tr>
        @endforeach
    </table>
</div>
