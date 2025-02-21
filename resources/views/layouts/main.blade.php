<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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
        a{text-decoration: none;cursor: pointer;}
        #footer a{color: #fff;line-height: 31px;}
        #footer a:hover{text-decoration: underline;}

    </style>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">

    <link rel="stylesheet" href="{{ asset('splide/css/splide.min.css')}}">

    <script src="{{ asset('splide/js/splide.min.js')}}"></script>


    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
  </head>
  <body>


    <div class="bg-primary text-center text-white p-2">#Learn Ecommerce Development</div>

    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-body border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal"><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></p>
          <nav class="my-2 my-md-0 me-md-3">
            @guest
            <a class="p-2 text-dark" href="{{ route('login')}}">Login</a>
            <a class="p-2 text-dark" href="{{ route('register')}}">Register</a>
            @endguest

            @if (Auth::check())
            <b>Welcome {{ Auth::user()->name}} </b>
            <a class="p-2 text-dark" href="{{ route('dashboard')}}">Account</a>
            <a class="p-2 text-dark" onclick="document.getElementById('logout-form').submit()">Logout</a>
            <form id="logout-form" action="{{ route('logout')}}" method="POST">
                @csrf
            </form>
            @endif
          </nav>
          @livewire('cart.preview')
      </header>
      @livewire('search')
      <main style="min-height: 300px;">

        @yield('content')


    </main>
    <div class="border-top">
        <div class="container">
            <footer class="pt-4 my-md-5 pt-md-5">
          <div class="row">
            <div class="col-12 col-md">
                <b>{{ config('app.name', 'Laravel') }}</b>
              <small class="d-block mb-3 text-muted">&copy; 2025</small>

              Follow us at <br><br>
              <a target="_black" href="#"><i class="fab fa-facebook-square fa-2x"></i></a> &nbsp;
              <a target="_black" href="#"><i class="fab fa-twitter-square fa-2x"></i></a> &nbsp;
              <a target="_black" href="#"><i class="fab fa-youtube-square fa-2x"></i></a>
            </div>
            <div class="col-6 col-md">
                @livewire('menu.links', ['name'=>'Categories'])
            </div>
            <div class="col-6 col-md">
                @livewire('menu.links', ['name'=>'Links'])
            </div>
            <div class="col-6 col-md">
                @livewire('menu.links', ['name'=>'Legals'])
            </div>
          </div>
            </footer>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @livewireScripts

    <script>
/*         Livewire.on('cartUpdate', productId => {
            Livewire.emit('postAdded')
            alert('Cart Preview Needs Update');
        }) */
    </script>
  </body>
</html>
