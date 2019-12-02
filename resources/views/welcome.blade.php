<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>



  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>




  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/vendor/jquery/jquery.min.js') }}" ></script>
  <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/vendor/jquery-easing/jquery.easing.min.js') }}" ></script>


  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.js') }}" ></script>



  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">




</head>
<body id="page-top">
<div id="app">
  <index></index>
</div>
</body>
</html>
