@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h5> Attribute Values for {{ $attribute->name }}</h5>
        @livewire('attribute.values', ['attribute'=>$attribute])
    </div>
@endsection
