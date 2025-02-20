<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <style>
            .lato-regular {
            font-family: "Lato", serif;
            font-size: 0.85em;
            font-weight: 400;
            font-style: normal;
                          }
            a{text-decoration: none;}
        </style>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">
    @livewireStyles
    </head>
    <body>
        <div id="menu" style="position:fixed;height:100%;margin-left:-25%;width:25%;transform-origin: 0% 0%;transition: all 0.8s;" class="bg-light shadow">
            <div>
            <a class="btn btn-secondary float-end m-3" onclick="toggleNav()"><i class="fas fa-times"></i></a>
            </div>
            <div class="clearfix"></div>

            <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.index')}}"><i class="fas fa-box-open fa-fw"></i>Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('product.index')}}"><i class="fas fa-square fa-fw"></i>Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index')}}"><i class="fas fa-list fa-fw"></i>Orders</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('page.index')}}"><i class="fas fa-file fa-fw"></i>Pages</a>
                  </li>
              </ul>
        </div>
        <div class="border-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col p-3">
                        <a class="btn btn-secondary me-3" onclick="toggleNav()"><i class="fas fa-bars"></i></a>
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            function toggleNav(){
                let currentMargin = document.getElementById('menu').style.marginLeft;
                if(currentMargin =='-25%'){
                    document.getElementById('menu').style.marginLeft='0%';
                }else{
                    document.getElementById('menu').style.marginLeft='-25%';
                }
            }
        </script>
        @livewireScripts
    </body>
</html>
