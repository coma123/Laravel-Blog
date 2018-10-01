@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Create new Tag</h3></div>
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new tag
        </div>
        <div class="panel-body">
        <form action="{{route('tag.store')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" name="tag" id="tag" placeholder="Enter Tag">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop