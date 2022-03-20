{{-- @extends('layouts.app')
@section('title')
Create Todos
@endsection
@section('content') --}}
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card card-default">
            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $todo->name }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Description" name="description" id="description" value="{{ $todo->description }}">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success" onclick="update(event, {{ $todo->id }})">Update Todo</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}