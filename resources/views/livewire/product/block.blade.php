<div class="col">
    <div class="card">
        <div class="card-body text-center">
            <div class="" style="height: 270px;">
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
            <h5 class="card-title mt-3"><a href="{{ route('product.view', ['product'=>$product->slug]) }}" class="card-link text-dark"> {{  $product->name }} </a> </h5>
            <h6 class="card-subtitle mb-2"><i class="fas fa-rupee-sign fa-xs"></i><span class="fs-5 text-primary"> {{  $product->selling_price }}</span> <strike class="text-muted"><i class="fas fa-rupee-sign fa-xs"></i> {{  $product->price }} </strike>
            @if($product->selling_price<$product->price)
                Save <i class="fas fa-rupee-sign fa-xs"></i> {{ $product->price-$product->selling_price }}  ({{ floor((($product->price-$product->selling_price)*100)/$product->price) }}%)
             @endif
            </h6>
            <p class="card-text"> {{  substr($product->description, 0, 80) }} </p>
        </div>
    </div>
</div>
