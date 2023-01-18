<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{config('app.name')}} | @yield('title')</title>
  <meta content="@yield('description')" name="description">
  <meta content="@yield('keywords')" name="keywords">
  <meta content="index, follow" name="robots">
  <meta property="og:title" content="{{config('app.name')}} | @yield('title')">
  <meta property="og:type" content="product" />
  <meta property="og:description" content="@yield('description')">
  <meta property="og:url" content="@yield('canonical')">
  <meta property="og:site_name" content="{{config('app.name')}} | @yield('title')">
  <meta property="og:image" content="@yield('image')">
  <link rel="canonical" href="@yield('canonical')"/>

  <!-- Favicons -->
  <link href="{{asset('template/img/favicon.png')}}" rel="icon"> <!-- à créer -->
  <link href="{{asset('template/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> <!-- à créer -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('template/bootstrap/css/bootstrap-quartz.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/bootstrap/css/custom.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/bootstrap-icons/font/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('template/prismjs/themes/prism-okaidia.css')}}">

</head>
