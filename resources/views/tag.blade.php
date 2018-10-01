@extends('layouts.frontend')

@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{ $tag->tag }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="row">
                    <div class="case-item-wrap">
                        @if ($tag->posts->count() > 0)
                        
                            @foreach ($tag->posts as $post)
                                <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                    <a href="{{ route('post.single', ['slug' => $post->slug]) }}">
                                        <div class="case-item">
                                            <div class="case-item__thumb" data-offset="5">
                                                <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                            </div>
                                        
                                            <h6 class="case-item__title">{{ $post->title }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <h1 class="text-center">No posts for this tag</h1>          
                        @endif
                        
                    </div>
                </div>
                <!-- End Post Details -->
                <br>
                <br>
                <br>
            </main>
        </div>
    </div>
@stop