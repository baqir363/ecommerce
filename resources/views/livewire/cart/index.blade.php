<div>
    <h1>{{ $message }}</h1>
    @foreach ($cart as $key=>$val)
            @livewire('cart.item', ['productId'=>$key], key($key))
    @endforeach
</div>
