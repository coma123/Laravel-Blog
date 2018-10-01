@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Edit Categorie</h3></div>
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update category: {{$category->name}}
        </div>
        <div class="panel-body">
        <form action="{{route('category.update', ['id' => $category->id])}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop