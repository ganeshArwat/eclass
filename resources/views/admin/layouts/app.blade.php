<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar-dark navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-dark text-white" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row min-vh-100 flex-column flex-md-row">
    
                <Aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark flex-shrink-1">
    
                    <nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top "
                        id="sidebar">
    
                        <div class="text-center p-3">
                            <img src="{{url('img\eclass.png')}}" alt="profile picture" class="img-fluid  my-4 p-1 d-none d-md-block shadow">
    
                            <a href="#" class="navbar-brand mx-0 font-weight-bold text-nowrap"> ECLASS</a>
                        </div>
                       <button type="button" class="navbar-toggler  border-0 order-1" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation"> <span class=" navbar-toggler-icon"> </span> </button>
    
                       <div class="collapse navbar-collapse order-last" id="nav">
    
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="{{route('course.index')}}" class="nav-link active">Manage Courses</a>
                            </li>
    
                            <li class="nav-item">
                                <a href="{{route('sem.index')}}" class="nav-link ">Manage sem</a>
                            </li>
    
                            <li class="nav-item">
                                <a href="{{route('subject.index')}}" class="nav-link ">Manage subject</a>
                            </li>
    
                            <li class="nav-item">
                                <a href="#" class="nav-link ">Manage teacher</a>
                            </li>
    
                            <li class="nav-item">
                                <a href="#" class="nav-link ">Manage student</a>
                            </li>
                        </ul>
    
                       
                       </div>
                    </nav>
                </Aside>
                <main class="col px-0 flex-grow-1">
                    @yield('content')
                </main>
          </div>
        </div>

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>


</html>
