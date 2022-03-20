<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
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
                        <a class="nav-link" {{-- href="Route('create')" --}} onclick="create()">Create Todos <span class="sr-only">(current)</span></a>
                    </li>
                      
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ Route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout <span class="sr-only">(current)</span></a>
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
            {{-- @yield('content') --}}
        </div>
        <div id="content"></div>
 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="pages"></div>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="store">Save changes</button>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <button onclick="show(1)">asu</button> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        
        {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
        <script>
            // menampilkan Data
            function read() {
                $.get("{{ url('todos') }}", {}, function(data, status) {
                    $("#content").html(data);
                });
            };
            function create() {
                $.get("{{ url('todos/create') }}", {}, function(data, status) {
                    $("#exampleModalLabel").html('Create Todo');
                    $("#pages").html(data);
                    $("#exampleModal").modal('show');
                });
            };
            // proses create data
            function store(e) {
                // $('.close').click();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
            
                jQuery.ajax({
                    url: "{{ route('store') }}",
                    method: "post",
                    data: {
                        name: $('#name').val(),
                        description: $('#description').val()
                    },
                    success: function(data) {
                        read();
                        $('.close').click();
                    },
                    error: function(data) {
                        console.log('error', data);
                    }
                });
            };
            // melihat detail todo
            function show(id) {
                $.get("{{ url('todos/show') }}/" + id, {}, function(data, status) {
                    $("#exampleModalLabel").html('Edit Todo');
                    $("#pages").html(data);
                    $("#exampleModal").modal('show');
                });
            };
            // modal halaman edit
            function edit(id) {
                $.get("{{ url('todos/edit') }}/" + id, {}, function(data, status) {
                    $("#exampleModalLabel").html('Update Todo');
                    $("#pages").html(data);
                    $("#exampleModal").modal('show');
                });
            };
            // proses update todo
            function update(e, id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                console.log(id);
                $.ajax({
                    url: "{{ url('todos/update') }}/" + id,
                    method: "post",
                    data: {
                        name: $("#name").val(),
                        description: $("#description").val()
                    },
                    
                    success: function(data) {
                        read();
                        $(".close").click();
                    }
                });
            };
            // delete todo
            function destroy(id) {
                $.ajax({
                    url: "{{ url('todos/delete') }}/" + id,
                    method: "get",
                    success: function(data) {
                        read();
                        $(".close").click();
                    }
                });
            };
            // complete todo
            function complete(id) {
                $.ajax({
                    url: "{{ url('todos/complete') }}/" + id,
                    method: "get",
                    success: function(data) {
                        read();
                        $(".close").click();
                    }
                });
            };
            jQuery(document).ready(function(){
                // read DataBase
                read();
                
                // Modal Halaman Create
                // jQuery("#create").click(function(){
                //     $.get("{{ url('todos/create') }}", {}, function(data, status) {
                //         $("#exampleModalLabel").html('Create Todo');
                //         $("#pages").html(data);
                //         $("#exampleModal").modal('show');
                //     });
                // });
                // Proses create Modal
               
                // jQuery("#store").click(function(e) {
                //     // $('.close').click();
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                //         }
                //     });
                //     e.preventDefault();
                
                //     jQuery.ajax({
                //         url: "{{ route('store') }}",
                //         method: "post",
                //         data: {
                //             name: $('#name').val(),
                //             description: $('#description').val()
                //         },
                //         success: function(data) {
                //             read();
                //             $('.close').click();
                //         },
                //         error: function(data) {
                //             console.log('error', data);
                //         }
                //     });
                // });
                // Modal Halaman show
                

            });
        </script>
    </body>

</html>