    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="" style="height: 270px;">
                    @if(sizeof($product->images)>0)
                    <img src="{{ asset('storage/'.$product->images[0]->images)}}" class="rounded mx-auto d-block mw-100 mh-100" alt="">
                    @else
                        <div class="bg-secondary text-white text-center h-100">
                            <h5>No Image</h5>
                        </div>
                    @endif
                </div>
              <h5 class="card-title mt-3"><a href="{{ route('product.view', ['product'=>$product->slug])}}"> {{  $product->name }} </a> </h5>
              <h6 class="card-subtitle mb-2 text-muted"> {{  $product->price }} </h6>
              <p class="card-text"> {{  substr($product->description, 0, 80) }} </p>
              <a href="#" class="card-link">Add to Card</a>
              <a href="{{ route('product.view', ['product'=>$product->slug])}}" class="card-link">View Details</a>
            </div>
          </div>
    </div>
