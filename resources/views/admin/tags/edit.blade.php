@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Edit Tag</h3></div>
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update tag: {{$tag->tag}}
        </div>
        <div class="panel-body">
        <form action="{{route('tag.update', ['id' => $tag->id])}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control" name="tag" id="tag" value="{{$tag->tag}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop