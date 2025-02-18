@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h5>Welcome {{ Auth::user()->name }}</h5>

        <div class="card my-3">
            <div class="card-header">
                Orders
            </div>
            <div class="card-body">
                @forelse (Auth::user()->orders as $order)
                    <span class="badge rounded-pill bg-info text-dark">{{ $order->status}}</span>
                    Order Id : {{ $order->id }}, Amount {{ $order->amount }},
                    @foreach ($order->items as $item)
                        {{ $item->product_id}}
                    @endforeach
                    <hr>
                @empty
                    <div class="text-dark">You dont hava any orders. <br><a class="btn btn-sm btn-primary" href="{{ url('/')}}">Shop Now</a><br>to create your first order</div>
                @endforelse
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                My Address List
            </div>
            <div class="card-body">
                ...
            </div>
        </div>
    </div>
@endsection
