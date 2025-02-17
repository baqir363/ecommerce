@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h1>Cart Items</h1>
        @if(session('cart'))
            <div class="row">
                <div class="col-md-8">
                    @livewire('cart.index')
                </div>
                <div class="col-md-4">
                    @livewire('cart.total')
                    <a href="{{ route('checkout')}}" class="btn btn-success w-100 my-3">Checkout</a>
                </div>
            </div>
        @else
        <div class="text-danger">No items in cart</div>
        @endif
    </div>
@endsection
