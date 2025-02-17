<div>
    @if($quantity==0)
    <button wire:click="addToCart" class="btn btn-sm btn-primary">Add to Cart</button>
    @else
    Added to cart <a class="btn btn-sm btn-info ms-3" href="{{ route('cart') }}">View cart</a>
    @endif
    <button class="btn btn-sm btn-secondary ms-3">Add to wishlist</button>
    <span class="">{{ $message }}</span>
</div>
