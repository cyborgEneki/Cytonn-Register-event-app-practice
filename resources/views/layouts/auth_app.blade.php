<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cytonn_Register') }} </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--font-->

    <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">


</head>
<body>
<div id="app">
    <div class="auth_back">
      <div class="grid-x">
          <div class="medium-offset-3"></div>
          <div class="medium-9">
              <h1>Cytonn Register</h1>
              <p>We Register Cytonn Events</p>
          </div>
      </div>
    </div>
    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).foundation();
</script>

</body>
</html>
