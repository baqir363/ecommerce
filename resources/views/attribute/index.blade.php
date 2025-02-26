@extends('layouts.admin')

@section('content')
    <div class="p-5">
        <h1>Attributes</h1><br><br>
            <a href="{{route('attribute.create')}}" class="btn btn-sm btn-primary my-3">
             Create
            </a>

        <table class="table table-bordered">
            <thead class="bg-gray-50">
                <tr>
                    <th>Id</th>
                    <th> Name </th>
                    <th>Values</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">

            @forelse ($attributes as $attribute)
                <tr>
                    <td> {{ $attribute->id}} </td>
                    <td>{{ $attribute->name}}</td>
                    <td>
                        <a href="{{ route('attribute.values', ['attribute'=>$attribute->id]) }}">Values</a>
                    </td>
                    <td><a class="btn btn-sm btn-info" href="{{ route('attribute.edit',['attribute'=>$attribute->id]) }} "><i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="deleteCat({{ $attribute->id }})"><i class="fas fa-trash-alt"></i> Delete</a>
                    <form id="cat{{ $attribute->id }}" action="{{ route('attribute.destroy',['attribute'=>$attribute->id]) }}" method="POST">
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
