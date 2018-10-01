@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Tags</h3></div>
    <table class="table table-hover">
        <thead>
            <th>
                Tag Name
            </th>
            <th>
                Editing
            </th>
            <th>
                Deleting
            </th>
        </thead>
        <tbody>
            @if($tags->count() > 0)
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->tag}}</td>
                        <td>
                        <a href="{{route('tag.edit', ['id' => $tag->id])}}" class="btn btn-info btn-xs">
                            Edit
                        </a>
                        </td>
                        <td>
                            <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-danger btn-xs">
                             Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr>
                <th colspan="3" class="text-center">No Tags Yet</th>
            </tr>
            @endif
        </tbody>
    </table>
@stop