{{-- @extends('layouts.app')

@section('title')
Single Todo {{$todo->name}}
@endsection

@section('content') --}}
<div class="container">
    <h5 class="text-center">{{$todo->name}}</h5>

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>
            <a class="button btn btn-info my-2" onclick="edit({{ $todo->id }})">Edit</a>
            <a class="button btn btn-danger my-2" onclick="destroy({{ $todo->id }})">Delete</a>
        </div>
    </div>
</div>
{{-- @endsection --}}