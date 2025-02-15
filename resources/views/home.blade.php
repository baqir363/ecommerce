@extends('layouts.main')

@section('content')
<a href="{{ route('product.list')}}" class="float-end btn btn-sm btn-outline-success">View All</a>
    <h5 class="my-3">Latest Products</h5>
    <div class="clearfix"></div>
    <div class="row">
    @foreach ($latest as $product)
         @livewire('product.block', ['product' => $product])
    @endforeach
    </div>
@endsection
