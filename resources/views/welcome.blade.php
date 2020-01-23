<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <!--  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>



  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>




  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/vendor/jquery/jquery.min.js') }}" ></script>


<!--   <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script> -->

  <!-- Core plugin JavaScript-->
 <!--  <script src="{{ asset('js/vendor/jquery-easing/jquery.easing.min.js') }}" ></script> -->


  <!-- Custom scripts for all pages-->
  <!-- <script src="{{ asset('js/sb-admin.js') }}" ></script> -->


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--   <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> -->

  <link href="//rawgit.com/lykmapipo/themify-icons/master/css/themify-icons.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="//unpkg.com/vuelidate@0.5.0/dist/vuelidate.min.js"></script>
  <script src="//unpkg.com/vuelidate@0.5.0/dist/validators.min.js"></script>

</head>
<body id="page-top">
<div id="app">
  <index></index>
</div>
</body>
</html>
