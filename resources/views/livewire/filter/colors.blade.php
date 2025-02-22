<div>
    @foreach ($colors as $color)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="category{{ $color }}">
            <label class="form-check-label" for="category{{ $color }}">
                {{ $color }}
            </label>
        </div>
    @endforeach
</div>
