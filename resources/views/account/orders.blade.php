@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <h5>My Orders</h5>

        <div class="row">
            <div class="col-md-8">
                @forelse (Auth::user()->orders as $order)
                <div class="card my-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                            Order On<br>
                                <i class="far fa-calendar text-primary"></i> {{ date("d-m-Y", strtotime($order->created_at))}}  <i class="far fa-clock text-primary"></i> {{ date("h:i a", strtotime($order->created_at))}}
                            </div>
                            <div class="col">
                                Total<br>
                                {{ $order->amount }}
                            </div>
                            <div class="col text-end">
                                Order Id : {{ $order->id }}<br>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Order Details</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <span class="badge rounded-pill bg-info text-dark">{{ $order->status}}</span> {{ date("d M Y", strtotime($order->updated_at))}}
                        @foreach ($order->products as $product)
                        <br>{{ $product->name }}
                            <div style="width: 100px;">
                                @if(sizeof($product->images)>0)
                                    <img src="{{ asset('storage/'.$product->images[0]->images)}}" class="rounded mx-auto d-block mw-100 mh-100" alt="">
                                @else
                                    <div class="bg-secondary text-white text-center h-100">
                                        <h5>No Image</h5>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="text-dark">You dont hava any orders. <br><a class="btn btn-sm btn-primary" href="{{ url('/')}}">Shop Now</a><br>to create your first order</div>
                @endforelse
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
@endsection
