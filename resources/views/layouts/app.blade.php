<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kassandra Klassen') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-theme.min.css')}}" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/include/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <style media="screen">

      body{
        font-family: Raleway,sans-serif;
      }


      #main-nav{
        position : fixed;
      }
    </style>

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav id='main-nav' class="navbar navbar-default navbar-fixed-left">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Kassandra Klassen
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      <li><a href="">Upcoming Shows</a></li>
                      <li><a href="">Upcoming Projects</a></li>
                      <li><a href="{{route('about')}}">About Kassandra</a></li>
                      <li><a href="">Contact</a></li>
                      <li><a href="">****************</a></li>
                      <li><a href="">Cool Asterixes</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        &nbsp
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    @yield('scripts')
</body>
</html>
