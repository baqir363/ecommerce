@extends('layouts.admin')

@section('content')
    <div class="p-5">
        <h1 class="text-lg">Pages</h1><br>
        <a href="{{route('page.create')}}" class="btn btn-sm btn-primary my-3">
            Create page
        </a>

        <table class="table table-bordered">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        URL
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="table table-bordered">

                @foreach ($pages as $page)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $page->name}}</div>
                            <div class="text-sm text-gray-500">..</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rouded-full bg-green-100 text-green-800">
                                {{ $page->slug}}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indiigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@endsection
