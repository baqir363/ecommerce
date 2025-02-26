@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="mb-3">Edit Product</h1>

                @livewire('product.images',['product'=>$product])

                <form action="{{ route('product.update', ['product'=>$product->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $product->name}}" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ $product->slug}}" class="form-control">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select type="text" name="category_id" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"
                                        @if($category->id == $product->category_id)
                                            selected= "selected"
                                        @endif
                                        >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ $product->price}}" class="form-control">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="selling_price"> Selling Price</label>
                            <input type="text" name="selling_price" id="selling_price" value="{{ $product->selling_price}}" class="form-control">
                            @error('selling_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description"> Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $product->description}}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="attributes">Attributes</label>
                            <input type="text" name="attributes" class="form-control">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
                </form>
            </div>
        </div>

    </div>
@endsection
