<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ayycoffee') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @if(!Request::is('login') && !Request::is('register') && !Request::is('/') ) 
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <h3>Coffee Archive</h3>

                <ul class="navbar-nav ms-auto">
                <a class="navbar-brand active hover {{ Request::is('home') ? 'active-style' : ''}}" href="{{ url('/home') }}">
                   Home
                </a>
                <a class="navbar-brand active hover {{ Request::is('menus') ? 'active-style' : ''}}" href="{{ url('/menus') }}">
                 Menu
                </a>
                <a class="navbar-brand active hover {{ Request::is('tokos') ? 'active-style' : ''}}" href="{{ url('/tokos') }}">
                 Outlet
                </a>
                <a class="navbar-brand active hover {{ Request::is('galerys') ? 'active-style' : ''}}" href="{{ url('/galerys') }}">
                 Galery
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link active hover" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active hover" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown " class="nav-link dropdown-toggle logout" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
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
        </nav>
        @endif
    </div>
        
        <main class="py-4">
            @yield('content')
        </main>

        <main>
            <!-- Button trigger modal -->
            
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       @yield('modal')
                    </div>
                    
                    </div>
                </div>
                </div>     
        </main>
     <style>
        body{
            background-color: rgba(255, 255, 255 , 0.5);
            background-filter: blur(10px);
            color: #F2EAE0;
            /* width: 1000px; */
        }
        .active{
           color: #F2EAE0;
           font-weight: bold;
        }
        .hover:hover{
            transition: all 0.3s ease;
            border-bottom: 2px solid #A98B76;
            font-weight: bold;
            color: #C4A484;
            transform: translateY(-2px);
            font-size: 20px;
        }
        #navbarDropdown{
            color: #F2EAE0;
            font-weight: bold;
            font-size: 16px;
        }
        h3{
            font-weight: bold;
        }
        h3:hover{
            transition: all 0.3s ease;
            font-weight: bold;
            color: #F3E9DC;
            transform: translateY(-2px);
            font-size: 28px;
        }
        .logout{
            font-size: 16px;
            color: #F2EAE0;
            font-weight: bold;
        }
        .logout:hover{
            font-weight: bold;
            color: #C4A484;
        }
        .active-style {
           background-color: transparent;
           border: 2px solid #F3E9DC;
           color: #F3E9DC;
           padding: 5px 15px;
           font-weight: bold;
           border-radius: 6rem;

        }
        .nav-link.hover:hover{
            color: #f39c12;
        }
        .navbar-nav .nav-item.dropdownn .logout{
            color: #F3E9DC !important;
        }
        .logout:focus, .logout:active{
            color:#F3E9DC !important;
        }
        .dropdown-item:hover{
            background-color: #F3E9DC;
            color: #4f3f2f;
            font-weight: bold;
        }
     </style>
</body>
<footer class="bg-body-tertiary text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgb(0, 0, 0);">
    © 2026 Copyright: ayycoffee
    {{-- <a class="text-body" style="color: white;" href="https://mdbootstrap.com/">MDBootstrap.com</a> --}}
  </div>
  <!-- Copyright -->
</footer>
</html>