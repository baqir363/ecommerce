@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h1>Create Attribute</h1>
        <form action="{{ route('attribute.update', ['attribute'=>$attribute->id])}}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $attribute->name}}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Update">
        </form>
    </div>
@endsection
