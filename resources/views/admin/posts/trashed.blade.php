@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Trashed Posts</h3></div>
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
                Restore
            </th>
            <th>
                Delete
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"> </td>
                        <td>{{ $post->title }}</td>
                        <td>Edit</td>
                        <td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success btn-xs">Restore</a></td>
                        <td><a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-xs">Delete</a></td>
                    </tr> 
                @endforeach
            @else
                <tr>
                    <th colspan="5" class="text-center">No trashed posts</th>
                </tr>
            @endif
        </tbody>
    </table>
@stop