@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h5> Varients for {{ $product->name }}</h5>
        @livewire('product.varients', ['product'=>$product])
    </div>
@endsection
