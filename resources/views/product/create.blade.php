@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-5">
        <h1 class="mb-3">Create Product</h1>
        <form action="{{ route('product.store')}}" method="POST">
        @csrf
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <div class="col mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug')}}" class="form-control">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-3">
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
                        <div class="col mb-3">
                            <label for="description"> Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description')}}">
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   @livewire('attribute.select')

                   <a onclick="createVariants()" class="btn btn-primary btn-sm">Create Variants</a>

                   <div class="mb-3">
                        <table class="table table-bordered" id="varients">
                            <tbody>
                                <tr>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </tbody>
                        </table>
                   </div>
                    <div class="col mb-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" value="{{ old('price')}}" class="form-control">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="selling_price"> Selling Price</label>
                        <input type="text" name="selling_price" id="selling_price" value="{{ old('selling_price')}}" class="form-control">
                        @error('selling_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a class="btn btn-info">Add Variant</a>
                    <input class="btn btn-primary" type="submit" value="Create">
    </form>
    </div>

    <script>
        function getCombn(arr, pre) {
            pre = pre || '';
            if(!arr.length) {
                return pre;
            }
            var ans = arr[0].reduce(function(ans, value) {
                return ans.concat(getCombn(arr.slice(1), pre+ '_'+value));
            }, []);
            return ans;
        }
        function createVariants(){
            var arr = [];
            var attrs = document.getElementsByClassName("attribute");
            for(var i = 0; i < attrs.length; i++){
                    var attributeId = attrs.item(i).value;
                    arr[i] = [];
                    var attrvals = document.getElementsByClassName("class-"+attributeId);
                    for(var j = 0; j < attrvals.length; j++){
                        if(attrvals.item(j).checked){
                            arr[i].push(attrvals.item(j).value);
                        }
                    }
                }
            let combinations = getCombn(arr);
            let varientTable = document.getElementById('varients');
                    for(var i = 0; i < combinations.length; i++){
                        var rownum = i+1;
                        var row = varientTable.insertRow(rownum);
                        // combinations[i];
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        cell1.innerHTML = combinations[i];
                        cell2.innerHTML = "<input class='form-control' type='text'>";
                        cell3.innerHTML = "<input class='form-control' type='text'>";
                    }
        }

        function checkAll(attrid, checked){
            var attrvals = document.getElementsByClassName("class-"+attrid);
            for(var i = 0; i < attrvals.length; i++){
                attrvals.item(i).checked = checked;
            }
        }
    </script>
@endsection
