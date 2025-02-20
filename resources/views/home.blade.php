@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="splide1" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide text-center">
                            <div class="splide__slide__container">
                                <img src="images/slide 1.png" alt="">
                            </div>
                        </li>
                        <li class="splide__slide text-center">
                            <div class="splide__slide__container">
                                <img src="images/slide 2.png" alt="">
                            </div>
                        </li>
                        <li class="splide__slide text-center">
                            <div class="splide__slide__container">
                                <img src="images/slide 3.png" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="col-md-6">
                <div id="secondary-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                01
                            </li>
                            <li class="splide__slide">
                                02
                            </li>
                            <li class="splide__slide">
                                03
                            </li>
                            <li class="splide__slide">
                                04
                            </li>
                            <li class="splide__slide">
                                05
                            </li>
                            <li class="splide__slide">
                                06
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <a href="{{ route('product.list')}}" class="float-end btn btn-sm btn-outline-success">View All</a>
        <h5 class="my-3">Latest Products</h5>
        <div class="clearfix"></div>
    <div class="row">
        @foreach ($latest as $product)
            @livewire('product.block', ['product' => $product])
        @endforeach
    </div>
        <h5 class="my-3">Featured Products</h5>

        <h5 class="my-3">Today's deals</h5>

        <h5 class="my-3">Related Items you have viewed</h5>

    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
            new Splide('#splide1').mount();
            new Splide( '#secondary-slider', {
                rewind  : true,
                gap     : 10,
                perPage : 2,
                pagination: false,
            }).mount();
        } );
      </script>
@endsection
