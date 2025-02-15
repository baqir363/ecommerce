@extends('layouts.admin')

@section('content')
    <div class="p-5">
        <h1>Categories</h1><br><br>
            <a href="{{route('category.create')}}" class="btn btn-sm btn-primary my-3">
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

            @forelse ($categories as $category)
                <tr>
                    <td> {{ $category->id}} </td>
                    <td>{{ $category->name}}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ route('category.edit',['category'=>$category->id]) }} "><i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="deleteCat({{ $category->id }})"><i class="fas fa-trash-alt"></i> Delete</a>
                    <form id="cat{{ $category->id }}" action="{{ route('category.destroy',['category'=>$category->id]) }}" method="POST">
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

    </div>
    <script>
        function deleteCat(catId){
            document.getElementById('cat'+catId).submit();
        }
    </script>

@endsection
