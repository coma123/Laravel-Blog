@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Users</h3></div>
    <table class="table table-hover">
        <thead>
            <th>
                Image
            </th>
            <th>
                Name
            </th>
            <th>
                Permissions
            </th>
            <th>
                Delete
            </th>
        </thead>
        <tbody>
            @if($users->count() > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-radius: 50%">
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            @if (Auth::id() !== $user->id)
                                @if ($user->admin)
                                    <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove Permissions</a>  
                                @else
                                    <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if (Auth::id() !== $user->id)
                            <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete</a> 
                            @endif
                        </td>
                    </tr> 
                @endforeach
            @else
            <tr>
                    <th colspan="4" class="text-center">No Users</th>
                </tr>
            @endif
        </tbody>
    </table>
@stop