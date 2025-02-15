@extends('layouts.admin')

@section('content')
    <div class="p-5">
        <h1>Product</h1><br><br>
            <a href="{{route('product.create')}}" class="btn btn-sm btn-primary my-3">
             Create
            </a>

        <table class="table table-bordered">
            <thead class="bg-gray-50">
                <tr>
                    <th>Id</th>
                    <th> Name </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table table-bordered">

            @forelse ($products as $product)
                <tr>
                    <td> {{ $product->id}} </td>
                    <td>{{ $product->name}}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ route('product.edit',['product'=>$product->id]) }} "><i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="deleteCat({{ $product->id }})"><i class="fas fa-trash-alt"></i> Delete</a>
                    <form id="cat{{ $product->id }}" action="{{ route('product.destroy',['product'=>$product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    </td>
                </tr>
            @empty
                <div class="text-danger">No records found</div>
            @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    <script>
        function deleteCat(catId){
            document.getElementById('cat'+catId).submit();
        }
    </script>

@endsection
