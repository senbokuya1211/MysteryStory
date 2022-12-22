<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf_8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Mystery Story</title>
  <meta name="description" content="">
  <link href="{{asset('css/reset.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/sp.css')}}" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/9157520a7e.js" crossorigin="anonymous"></script>
</head>
<body>
@include('header')
<main>
  @yield('content')
</main>
@include('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
