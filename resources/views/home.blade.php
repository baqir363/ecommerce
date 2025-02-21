@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div id="splide1" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($banners as $banner)
                            <li class="splide__slide text-center">
                                <div class="splide__slide__container">
                                    <img src="{{ asset('storage/'.$banner->image )}}" class="w-50" alt="">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 bg-info">
        </div>
        </div>
    </div>
    <div class="container-fluid">
            <a href="{{ route('product.list')}}" class="float-end btn btn-sm btn-outline-success">View All</a>
            <h5 class="my-3">Latest Products</h5>
            <div class="clearfix"></div>
        <div class="row">
            @foreach ($latest as $product)
                @livewire('product.block', ['product' => $product])
            @endforeach
        </div>

            @foreach ($collections as $collection)
                <h5 class="my-3">{{ $collection->name }}</h5>
                <div class="row">
                    @foreach ($collection->products as $product)
                        @livewire('product.block', ['product' => $product])
                    @endforeach
                </div>
            @endforeach

            <h5 class="my-3">Related Items you have viewed</h5>
    </div>
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
                new Splide( '#splide1', {
                    type  : 'loop',
                    autoplay : true,
                    interval : '3000',
                }).mount();
        } );
      </script>
@endsection
