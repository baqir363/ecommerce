@extends('layouts.main')

@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-3 col-lg-2">
                <div class="mb-2 fw-bolder">Categories</div>
                @livewire('filter.categories')


                <div class="my-2 fw-bolder">Colors</div>
                @livewire('filter.colors')

                <div class="my-2 fw-bolder">Price</div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="range" id="u0">
                        <label class="form-check-label" for="u0">
                            Under 500
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="range" id="u500">
                        <label class="form-check-label" for="u500">
                            500-1000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="range" id="u1000">
                        <label class="form-check-label" for="u1000">
                            1000-3000
                        </label>
                    </div>
            </div>
            <div class="col-md-9 col-lg-10">
                <div class="row">
                    @foreach ($products as $product)
                        @livewire('product.block', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
