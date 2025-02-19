<div class="border rounded my-3 p-4">
    <div class="row">
        <div class="col-2">
            <a href="{{ route('product.view', ['product'=>$product->slug]) }}">
                @if(sizeof($product->images)>0)
                    <img src="{{ asset('storage/'.$product->images[0]->images)}}" class="rounded mx-auto d-block mw-100 mh-100" alt="">
                @else
                    <div class="bg-secondary text-white text-center h-100">
                        <h5>No Image</h5>
                    </div>
                @endif
            </a>
        </div>
        <div class="col-5"><a href="{{ route('product.view', ['product'=>$product->slug]) }}"> {{ $product->name }} </a></div>
        <div class="col-3">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button" wire:click="minus">-</button>
                <input type="text" class="form-control text-center" size="3" value="{{ $quantity }}">
                <button class="btn btn-outline-secondary" type="button" wire:click="plus">+</button>
            </div>
            <a wire:click="remove" class="">Delete</a>
        </div>
        <div class="col-2 text-end fs-6"><i class="fas fa-rupee-sign fa-xs"></i> <span class="fw-bold">  {{ $product->selling_price*$quantity }} </span></div>
    </div>
</div>
