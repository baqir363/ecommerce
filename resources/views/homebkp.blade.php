@extends('layouts.main')

@section('content')

    <div>
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

                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <h3 class="my-4">Featured Product</h3>

        <div class="card" style="width: 18rem;">
            <img src="images/slide 1.png" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

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
