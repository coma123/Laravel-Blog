@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Create new Post</h3></div>
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new post
        </div>
        <div class="panel-body">
        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title">
                </div>
                <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" class="form-control" name="featured" id="featured">
                </div>
                <div class="form-group">
                    <label for="category">Selcet Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach ($tags as $tag)
                    <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}">{{$tag->tag}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control" placeholder="Enter Post Content"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Stote Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@stop