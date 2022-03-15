@extends('layouts.app')

@section('title')
Single Todo {{$todo->name}}
@endsection

@section('content')
<div class="container">
    <h1 class="text-center my-5">{{$todo->name}}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>
            </div>
            <a href="{{ route('edit', $todo->id) }}" class="button btn btn-info my-2">Edit</a>
            <a href="{{ route('delete', $todo->id) }}" class="button btn btn-danger my-2">Delete</a>
        </div>
    </div>
</div>
@endsection