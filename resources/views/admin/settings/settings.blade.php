@extends('layouts.app')

@section('content')
<div class="text-center"><h3>Edit Blog Settings</h3></div>
    @include('admin.includes.errors')
    
        <form action="{{route('settings.update')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" name="site_name" id="site_name" placeholder="Enter Site Name" value="{{ $settings->site_name }}">
                </div>

                <div class="form-group">
                    <label for="description">Site Description</label>
                    <textarea name="description" id="description" cols="6" rows="6" class="form-control" placeholder="Enter Site Description">{{ $settings->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="address">Address <small class="text-danger">(City, State, Country)</small></label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number <small class="text-danger">(With country code)</small> </label>
                    <input type="tel" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number" value="{{ $settings->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Enter Contact Email" value="{{ $settings->contact_email }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Site Settings</button>
                    </div>
                </div>
            </form>

@stop