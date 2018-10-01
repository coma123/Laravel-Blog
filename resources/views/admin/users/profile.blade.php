@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Edit Your Profile</h3></div>
    @include('admin.includes.errors')
    
        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload New Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter Facebook Profile URL" value="{{ $user->profile->facebook }}">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube Profile</label>
                    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Enter Youtube Profile URL" value="{{ $user->profile->youtube }}">
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control" placeholder="About You">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>

@stop