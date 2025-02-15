@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h1>Create Category</h1>
        <form action="{{ route('category.store')}}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Create">
        </form>
    </div>
@endsection
