@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Banners</h1>
                @livewire('banner.manage')
            </div>
        </div>
    </div>
@endsection
