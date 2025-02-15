<div class="shadow">
    <div class="container pt-3">
      <div class="row">
            <div class="col">
                <input wire:model.live="search" type="text" placeholder="Search Products" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                @foreach ($products as $product)
                    <div class="my-3 border-bottom">
                        @if(sizeof($product->images)>0)
                        <img src="{{ asset('storage/'.$product->images[0]->images)}}" class="rounded" style="width: 60px;" alt="">
                    @else
                        <div class="m-2 rounded bg-secondary text-white text-center float-start" style="width: 60px;">
                            <h5>No Image</h5>
                        </div>
                    @endif

                    <a href="{{ route('product.view', ['product'=>$product->slug])}}">{{ $product->name }} </a>
                    <div class="clearfix"></div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
