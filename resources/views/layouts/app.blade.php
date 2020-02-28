<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}">
    
    {{-- custom scripts --}}
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ route('profile', Auth::user()) }}" class="dropdown-item">profile page</a>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            <div class="container" style="position: relative; min-height: 70vh;">
                <div class="row">
                    @auth
                    <div class="col-md-2">
                        @include('layouts.sidebar')
                    </div>
                    
                    <div class="col-md-9 offset-md-1">
                        @include('layouts.errors')
                        @yield('content')
                    </div>
                    @endauth
                    @guest
                    <div class="col-md-12">
                        @yield('content')
                    </div>   
                    @endguest
                </div>
            </div>
        </main>
    </div>
    @yield('scripts')
    <footer class="footer-bs">
        <div class="row">
            <div class="col-md-2 footer-brand animated fadeInLeft">
                <img src="{{ asset('/storage/Logo.png') }}" class="img-fluid float-left" alt="" srcset="" width="85" height="85"> 
            </div>
            <div class="col-md-6 footer-brand">
                <p>Tripplanner is a project first conceived to obtain the title of specialist in web app development</p>
                <p>© Bruno Francisco Passaglia, All rights reserved</p>
            </div>
            <div class="col-md-4 footer-social animated fadeInDown">
                <ul>
                    <li>
                        <a href="https://br.linkedin.com/in/bruno-passaglia">LinkedIn</a>
                    </li>
                    <li>
                        <a href="https://github.com/brunoFpassaglia">GitHub</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>


</html>
