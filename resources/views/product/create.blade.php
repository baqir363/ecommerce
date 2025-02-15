@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="mb-3">Create Product</h1>
                <form action="{{ route('product.store')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug')}}" class="form-control">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select type="text" name="category_id" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ old('price')}}" class="form-control">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="selling_price"> Selling Price</label>
                            <input type="text" name="selling_price" id="selling_price" value="{{ old('selling_price')}}" class="form-control">
                            @error('selling_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description"> Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description')}}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="btn btn-primary" type="submit" value="Create">
                </form>
            </div>
        </div>

    </div>
@endsection
