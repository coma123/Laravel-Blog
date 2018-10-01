@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Create new User</h3></div>
    @include('admin.includes.errors')
    
        <form action="{{route('user.store')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add User</button>
                    </div>
                </div>
            </form>

@stop