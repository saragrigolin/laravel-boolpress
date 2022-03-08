<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @yield('script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('script')
    <title>@yield('documentTitle')</title>
</head>
<body>
        @include('partials.header')

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="position-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('admin.home')}}">
                                        <i class="bi bi-house"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.posts.index')}}">
                                        <i class="bi bi-files"></i>
                                        All Posts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                        <i class="bi bi-files"></i>
                                        All Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.posts.indexUser') }}">
                                        <i class="bi bi-files"></i>
                                        My Posts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
</body>
</html>