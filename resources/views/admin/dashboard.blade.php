@extends('layouts.app')

@section('content')
    <div class="col-lg-3">
        <div class="panel panel-info">
            @if(Auth::user()->admin)
                <div class="panel-heading text-center">
                    POSTED
                </div>
            @else
            <div class="panel-heading text-center">
                POSTED BY ME
            </div>
            @endif
            <div class="panel-body">
                <h1 class="text-center">{{ $post_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                TRASHED POSTS
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $trashed_post_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                CATEGORIES
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $categories_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                USERS
            </div>
            <div class="panel-body">
                <h1 class="text-center">{{ $user_count }}</h1>
            </div>
        </div>
    </div>

    
        
@endsection
