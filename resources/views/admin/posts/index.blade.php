@extends('layouts.app')

@section('content')
<div class="text-center">
    @if (Auth::user()->admin)
        <h3>All Posts</h3>
    @else
        <h3>My Posts</h3>
    @endif
</div>
    <table class="table table-hover">
        <thead>
            <th>
                Image
            </th>
            <th>
                Title
            </th>
            <th>
                Edit
            </th>
            <th>
                Trash
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"> </td>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-info btn-xs">Edit</a></td>
                        <td><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Trash</a></td>
                    </tr> 
                @endforeach
            @else
            <tr>
                    <th colspan="4" class="text-center">No published posts</th>
                </tr>
            @endif
        </tbody>
    </table>
@stop