@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h5>Welcome {{ Auth::user()->name }}</h5>

        <div class="card my-3">
            <div class="card-header">
                <a href="{{ route('orders')}}" class="float-end">View All Orders</a>
                Orders
            </div>
            <div class="card-body">
                @forelse (Auth::user()->orders->take(3) as $order)
                    <div class="row">
                        <div class="col">
                            <span class="badge rounded-pill bg-info text-dark">{{ $order->status}}</span>Order Id : {{ $order->id }}, Amount {{ $order->amount }},
                            @foreach ($order->products as $product)
                                <br>{{ $product->name }}
                            @endforeach
                        </div>
                        <div class="col text-end">

                    <i class="far fa-calendar text-primary"></i> {{ date("d-m-Y", strtotime($order->created_at))}}<i class="far fa-clock text-primary"></i> {{ date("h:i a", strtotime($order->created_at))}}
                        </div>
                    </div>
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

            @livewire('user.address')
            </div>
        </div>
    </div>
@endsection
