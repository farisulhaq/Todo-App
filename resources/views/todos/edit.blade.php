@extends('layouts.app')
@section('title')
Create Todos
@endsection
@section('content')
<h1 class="text-center my-5">Edit Todo</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit Todo</div>
            <div class="card-body">
                <form action={{ route('update', $todo->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $todo->name }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Description" name="description" id="description" value="{{ $todo->description }}">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Update Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection