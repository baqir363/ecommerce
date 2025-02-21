<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('storage/'.$banner->image)}}" class="w-100" alt="">
    </div>
    <div class="col-md-8">
        <b>{{ $banner->name }}</b><br>
        <a href="{{ $banner->link }}">{{ $banner->link }}</a><br><br>
        <a href="#" class="card-link"><i class="far fa-edit"></i> Edit</a>
        <a wire:click="delete()" class="card-link text-danger"><i class="far fa-trash-alt"></i> Delete</a>
    </div>
</div>
