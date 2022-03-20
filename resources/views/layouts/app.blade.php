<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>
            @yield('title')
        </title>

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @auth  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ Route('index') }}">Todos <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" {{-- href="Route('create')" --}} id="create">Create Todos <span class="sr-only">(current)</span></a>
                    </li>
                      
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ Route('logout') }}">Logout <span class="sr-only">(current)</span></a>
                    </li>
                    <form action="{{ Route('logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                </ul>
            </div>
            @endauth
        </nav>
        <div class="container">
            @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{session()->get('success')}}",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
            @endif
            @yield('content')
        </div>
       
    </body>

</html>