<div>
    @foreach ($categories as $category)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="category{{ $category->id }}">
            <label class="form-check-label" for="category{{ $category->id }}">
                {{ $category->name }}
            </label>
        </div>
    @endforeach
</div>
