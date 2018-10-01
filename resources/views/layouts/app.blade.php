<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog Dashboard</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Blog Home
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group" style="text-decoration: none">
                            <li class="list-group-item list-group-item-action list-group-item-info">
                                <i class="fas fa-home"></i>&nbsp;&nbsp;
                                <a href="{{route('home')}}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="nav-item list-group-item list-group-item-action list-group-item-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#post" data-parent="#exampleAccordion" aria-expanded="false" style="text-decoration: none">
                                    <span class="nav-link-text">Posts</span>&nbsp;&nbsp;  
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                                <ul class="sidenav-second-level collapse list-group" id="post" style="">
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="far fa-newspaper"></i>&nbsp;&nbsp;
                                        @if (Auth::user()->admin)
                                            <a href="{{route('posts')}}" style="text-decoration: none">All Posts</a>
                                        @else
                                            <a href="{{route('posts')}}" style="text-decoration: none">My Posts</a>
                                        @endif
                                    </li>
                                    @if (Auth::user()->admin)
                                        <li class="list-group-item list-group-item-action list-group-item-warning">
                                            <i class="fas fa-trash"></i>&nbsp;&nbsp;
                                            <a href="{{route('posts.trashed')}}" style="text-decoration: none">Trashed Posts</a>
                                        </li>
                                    @endif
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-pen"></i>&nbsp;&nbsp;
                                        <a href="{{route('post.create')}}" style="text-decoration: none">Create new post</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item list-group-item list-group-item-action list-group-item-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#category" data-parent="#exampleAccordion" aria-expanded="false" style="text-decoration: none">
                                    <span class="nav-link-text">Categories</span>&nbsp;&nbsp;
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                                <ul class="sidenav-second-level collapse list-group" id="category" style="">
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-sitemap"></i>&nbsp;&nbsp;
                                        <a href="{{route('categories')}}" style="text-decoration: none">All Categories</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="far fa-plus-square"></i>&nbsp;&nbsp;
                                        <a href="{{route('category.create')}}" style="text-decoration: none">Create new category</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item list-group-item list-group-item-action list-group-item-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#tag" data-parent="#exampleAccordion" aria-expanded="false" style="text-decoration: none">
                                    <span class="nav-link-text">Tags</span>&nbsp;&nbsp;  
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                                <ul class="sidenav-second-level collapse list-group" id="tag" style="">
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-tags"></i>&nbsp;&nbsp;
                                        <a href="{{route('tags')}}" style="text-decoration: none">All Tags</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-tag"></i>&nbsp;&nbsp;
                                        <a href="{{route('tag.create')}}" style="text-decoration: none">Create New Tag</a>
                                    </li>
                                </ul>
                            </li>
                            @if (Auth::user()->admin)
                            <li class="nav-item list-group-item list-group-item-action list-group-item-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user" data-parent="#exampleAccordion" aria-expanded="false" style="text-decoration: none">
                                    <span class="nav-link-text">Users</span>&nbsp;&nbsp;  
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                                <ul class="sidenav-second-level collapse list-group" id="user" style="">
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-users"></i>&nbsp;&nbsp;
                                        <a href="{{route('users')}}" style="text-decoration: none">All Users</a>
                                    </li>
                                    <li class="list-group-item list-group-item-action list-group-item-warning">
                                        <i class="fas fa-user-edit"></i>&nbsp;&nbsp;
                                        <a href="{{route('user.create')}}" style="text-decoration: none">Create New User</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            
                            
                            <li class="list-group-item list-group-item-action list-group-item-info">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;
                                <a href="{{route('user.profile')}}" style="text-decoration: none">My Profile</a>
                            </li> 
                            @if (Auth::user()->admin)
                                <li class="list-group-item list-group-item-action list-group-item-info">
                                    <i class="fa fa-fw fa-wrench"></i>&nbsp;&nbsp;
                                    <a href="{{route('settings')}}" style="text-decoration: none">Settings</a>
                                </li> 
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}")
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
    @yield('scripts')
</body>
</html>
