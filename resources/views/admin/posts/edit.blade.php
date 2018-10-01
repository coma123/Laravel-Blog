@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit post: {{ $post->title }}
        </div>
        <div class="panel-body">
        <form action="{{route('post.update', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" class="form-control" name="featured" id="featured">
                </div>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if ($post->category->id == $category->id)
                            selected
                        @endif 
                        >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="tags">Select tags</label>
                        @foreach ($tags as $tag)
                        <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if ($tag->id == $t->id)
                                       checked 
                                    @endif
                                @endforeach
                                >{{$tag->tag}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                <div class="form-group">
                        <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control" placeholder="Enter Post Content">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Post</button>
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