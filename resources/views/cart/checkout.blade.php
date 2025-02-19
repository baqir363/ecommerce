@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h1>Checkout</h1>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <h5>products</h5>
                @foreach ($cart as $item)
                <div class=" row border-bottom mb-3">
                    <div class="col">
                        {{ $item->product->name}}, {{ $item->quantity}}
                    </div>
                    <div class="col text-end">
                        <i class="fas fa-rupee-sign fa-xs"></i> <b>{{ $item->product->selling_price*$item->quantity}}</b>
                    </div>
                </div>
            @endforeach
            <h5 class="mt-5">Address Details</h5>
            @livewire('user.address')

            <h5 class="mt-5">Payment Method</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_mode" id="cod" value="cod" checked>
                <label class="form-check-label" for="cod">
                  Cash on Delivery
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_mode" id="online" value="online">
                <label class="form-check-label" for="online">
                  Online Payment(card/Net Banking/UPI)
                </label>
              </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-sm btn-primary w-100">Place order</button>
                @error('shipping_address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                @error('payment_mode')
                <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
        </div>
        </form>
    </div>
@endsection
