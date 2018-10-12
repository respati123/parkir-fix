<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Signin Template for Bootstrap</title>

    <link href="{{ asset('/css/login_css_bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('/css/signin.css') }}" rel="stylesheet">
  </head>

  <body class="text-center">
      <div id="register" style="width: 100%;height: auto;">
          <register-view></register-view>
      </div>

    <script src="/js/app.js"></script>
  </body>
</html>
