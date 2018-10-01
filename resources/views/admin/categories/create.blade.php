@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Create new Category</h3></div>
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new category
        </div>
        <div class="panel-body">
        <form action="{{route('category.store')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Stote Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop