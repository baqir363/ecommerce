<div>
    <div class="col mb-3">
        <label for="search">Attributes for variants</label>
        <input type="text" wire:model.live="search" placeholder="Search attributes for variants" class="form-control">
        <div class="my-3">
            @foreach ($results as $attribute)
                <a class="btn btn-primary btn-sm rounded-pill" wire:click="select('{{ $attribute->id }}')">{{ $attribute->name }}</a>
            @endforeach
        </div>
        <div class="my-3">
            @foreach ($attributes as $attribute)
                {{ $attribute->name }} -
                <div class="form-check form-check-inline">
                    <input class="form-check-input attribute" type="checkbox" id="attr{{ $attribute->id }}" value="{{ $attribute->id }}" onclick="checkAll('{{ $attribute->id }}', this.checked)">
                    <label class="form-check-label" for="attr{{ $attribute->id }}">All</label>
                </div>
                @foreach ($attribute->values as $val)
                <div class="form-check form-check-inline">
                    <input class="form-check-input class-{{ $attribute->id }}" type="checkbox" id="av{{ $val->id }}" value="{{ $val->value }}">
                    <label class="form-check-label" for="av{{ $val->id }}">{{ $val->value }}</label>
                </div>
                @endforeach
                <hr>
            @endforeach
        </div>
    </div>
</div>
