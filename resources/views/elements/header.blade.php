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
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('template/bootstrap/css/bootstrap-quartz.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/bootstrap/css/custom.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/bootstrap-icons/font/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('template/prismjs/themes/prism-okaidia.css')}}">

</head>
