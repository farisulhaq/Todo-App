<h1 class="text-center my-5">Todos APP</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Todos
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($todos as $todo)

                    <li class="list-group-item">{{ $todo->name }}
                        @if ($todo->complete)
                        <a onclick="destroy({{ $todo->id }})" style="color: white" class="button btn btn-danger btn-sm float-right">Delete</a>  
                        @else
                        <a onclick="complete({{ $todo->id }})" style="color: white" class="button btn btn-success btn-sm float-right">Complete</a>
                        @endif
                        <button onclick="show({{ $todo->id }})" {{-- href="route('show',$todo->id) --}}" style="color: white" class="button btn btn-primary btn-sm float-right mr-2">View</button>
                    </li>
                        
                    @empty
                    Todo Empty
                    @endforelse
                  </ul>
            </div>
        </div>
    </div>
</div>
{{-- @extends('layouts.app')
@section('title')
Todos List
@endsection

@section('content')
<h1 class="text-center my-5">Todos APP</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Todos
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($todos as $todo)

                    <li class="list-group-item">{{ $todo->name }}
                        @if ($todo->complete)
                        <a href="{{ route('delete', $todo->id) }}" style="color: white" class="button btn btn-danger btn-sm float-right">Delete</a>  
                        @else
                        <a href="{{ route('complete', $todo->id) }}" style="color: white" class="button btn btn-success btn-sm float-right">Complete</a>
                        @endif
                        <a href="{{ route('show', $todo->id) }}" style="color: white" class="button btn btn-primary btn-sm float-right mr-2">View</a>
                    </li>
                        
                    @empty
                    Todo Empty
                    @endforelse
                  </ul>
            </div>
        </div>
    </div>
</div>
@endsection --}}