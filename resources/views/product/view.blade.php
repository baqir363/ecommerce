@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="border rounded">
                    @if(sizeof($product->images)>0)
                    <img src="{{ asset('storage/'.$product->images[0]->images)}}" class="rounded mx-auto d-block w-100" alt="">
                    <br>
                    @foreach ($product->images as $image)
                        <div class="w-25 float-start p-2" style="height: 80px;">
                         <img src="{{ asset('storage/'.$image->images)}}" class="rounded mx-auto d-block mw-100 mh-100" alt="">
                        </div>
                    @endforeach
                    @else
                        <div class="bg-secondary text-white text-center" style="height: 200px;">
                            <h5>No Image</h5>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                 <h1>{{ $product->name }}</h1>
                 <p class="text-muted"><b>MRP</b> : <i class="fas fa-rupee-sign"></i> {{ $product->price}} </p>
                 <p class="fs-5 text-success"><b>Selling Price</b> : <i class="fas fa-rupee-sign"></i> {{ $product->selling_price}} </p>
                 @if($product->selling_price<$product->price)
                    Discount : {{ floor((($product->price-$product->selling_price)*100)/$product->price) }}%
                 @endif
                 <br><br>

                 @livewire('product.option', ['product'=>$product])
                 <p class="mt-5">{{ $product->description }}</p>
            </div>
        </div>
    </div>

@endsection
