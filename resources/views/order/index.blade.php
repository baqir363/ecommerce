@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <h1>Orders</h1>

        <table class="table table-striped">
            <tr>
                <th>Order Id</th>
                <th>Status</th>
                <th>Date</th>
                <th>User</th>
                <th>Products</th>
                <th>Action</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->user->name }}, {{ $order->user->email }}</td>
                    <td>
                        @foreach ($order->products as $product)
                            {{ $product->name }}
                        @endforeach
                    </td>
                    <td></td>

                </tr>
            @endforeach
        </table>
        {{ $orders->links()}}
    </div>
@endsection
