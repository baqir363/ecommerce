<div>
    @foreach ($products as $product)
        @livewire('product.block', ['product'=>$product], key($product->id))
    @endforeach
</div>
