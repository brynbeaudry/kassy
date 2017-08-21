<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{asset('css/sidebar.css')}}" rel="stylesheet" type="text/css">
        @yield('styles')

    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-">
          </div>
          @include('includes.sidebar')
          @yield('content')
        </div>
      </div>
    </body>
</html>
